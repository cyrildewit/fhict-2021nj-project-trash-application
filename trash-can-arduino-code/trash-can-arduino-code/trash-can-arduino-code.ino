#include <LiquidCrystal.h>
#include <LedControl.h>
#include <SPI.h>
#include <RFID.h>

//RFID scanner
#define SS_PIN 4
#define RST_PIN 5
RFID rfid(SS_PIN,RST_PIN);

//Sensor

int trigPin0 = 47;
int echoPin0 = 46;
int trigPin1 = 49;
int echoPin1 = 48;
int trigPin2 = 41;
int echoPin2 = 40;
int trigPin3 = 39;
int echoPin3 = 38;

int trigPinArray[] = {trigPin0, trigPin1, trigPin2, trigPin3};
int echoPinArray[] = {echoPin0, echoPin1, echoPin2, echoPin3};

//Maybe doens't work
//int trigPinArray[] = {47, 49, 41, 39};
//int echoPinArray[] = {46, 48, 40, 38};

//LCD
LiquidCrystal lcd(3, 2, 12, 11, 10, 9);

//Matrix
byte matrixAnimationArray[15][8] = {{B00000000, B00000000, B00000000, B00000000, B00000000, B00000000, B00000000, B00011000},
                          {B00000000, B00000000, B00000000, B00000000, B00000000, B00000000, B00011000, B00111100},
                          {B00000000, B00000000, B00000000, B00000000, B00000000, B00011000, B00111100, B01111110},
                          {B00000000, B00000000, B00000000, B00000000, B00011000, B00111100, B01111110, B11011011},
                          {B00000000, B00000000, B00000000, B00011000, B00111100, B01111110, B11011011, B10011001},
                          {B00000000, B00000000, B00011000, B00111100, B01111110, B11011011, B10011001, B00011000},
                          {B00000000, B00011000, B00111100, B01111110, B11011011, B10011001, B00011000, B00011000},
                          {B00011000, B00111100, B01111110, B11011011, B10011001, B00011000, B00011000, B00011000},
                          {B00111100, B01111110, B11011011, B10011001, B00011000, B00011000, B00011000, B00000000},
                          {B01111110, B11011011, B10011001, B00011000, B00011000, B00011000, B00000000, B00000000},
                          {B11011011, B10011001, B00011000, B00011000, B00011000, B00000000, B00000000, B00000000},
                          {B00011000, B00011000, B00011000, B00011000, B00000000, B00000000, B00000000, B00000000},
                          {B00011000, B00011000, B00011000, B00000000, B00000000, B00000000, B00000000, B00000000},
                          {B00011000, B00011000, B00000000, B00000000, B00000000, B00000000, B00000000, B00000000},
                          {B00011000, B00000000, B00000000, B00000000, B00000000, B00000000, B00000000, B00000000}};

byte smileyAnimationArray[8] = {B00000000,B00111100,B01000010,B00000000,B00000000,B01100110,B01100110,B00000000};
byte off[8] = {B00000000, B00000000, B00000000, B00000000, B00000000, B00000000, B00000000, B00000000};
LedControl lc2 = LedControl(22, 24, 23, 0);
LedControl lc = LedControl(25, 27, 26, 0);
LedControl lc3 = LedControl(28, 30, 29, 0);
LedControl lc4 = LedControl(31, 33, 32, 0);
LedControl matrix[] = {lc, lc3, lc2, lc4};

bool stringComplete = false;
String inputString = "";
String depositAmount = "";

//=========================================================================================================================================

void setup() {
  Serial.begin(9600);
    SPI.begin();
    rfid.init();
  for (int i = 0; i < 4; i++)
  {
    matrix[i].shutdown(0, false);  //The MAX72XX is in power-saving mode on startup
    matrix[i].setIntensity(0, 15); // Set the brightness to maximum value
    matrix[i].clearDisplay(0);
    pinMode(trigPinArray[i], OUTPUT);
    pinMode(echoPinArray[i], INPUT);
  }
  lcd.begin(16, 2);
  displayInformationOnLCD("Scan uw product hierboven");   
}

//=========================================================================================================================================

void loop() {

if (stringComplete)
 {
   stringComplete = false;
   //Removes # and \n
   String commandString = inputString.substring(1, inputString.length() - 1);
   inputString = "";
   
   if(commandString.substring(0, 1) == "^")
   {
     depositAmount = commandString.substring(1, commandString.length());
   }
     else if(commandString.substring(0, 1) == "~")
   {
     displayInformationOnLCD(commandString);
   }
   else 
   {
     int trashType = getTrashType(commandString);
 
     for (int x = 0; x < 12; x++)
      {
      if (matrixArrowAnimation(trashType))
        {
          matrix[trashType].clearDisplay(0);
          displayInformationOnLCD("Je kan " + depositAmount + " cent   claimen");
          sendUIDToVisualStudio();
          break;
        }
      }  
    }
  }
}

//=========================================================================================================================================

void serialEvent()
{
  while (Serial.available())
  {
    char inChar = (char)Serial.read();
    inputString += inChar;
    if (inChar == '\n' && inputString.substring(0,1) == "#" && inputString.length() > 1)
    {
      stringComplete = true;
    }
  }
}

//=========================================================================================================================================

int getTrashType(String commandString){
  if (commandString.equals("0"))
  {
    return 0;
  }

  if (commandString.equals("2"))
  {
    return 1;
  }

  if (commandString.equals("3"))
  {
    return 2;
  }

  if (commandString.equals("4"))
  {
    return 3;
  }
}

//=========================================================================================================================================

boolean matrixArrowAnimation(int matrixNumber){
     //Serial.println(matrixNumber);
    for (int i = 0; i < 15; i++)
    {
      if (checkDistanceSensorForTrash(trigPinArray[matrixNumber], echoPinArray[matrixNumber]) == true)
      {
        return true;
      }
      
        for (int j = 0; j < 8; j++)
        {
        matrix[matrixNumber].setRow(0, j, matrixAnimationArray[i][j]);
             if (checkDistanceSensorForTrash(trigPinArray[matrixNumber], echoPinArray[matrixNumber]) == true)
              {
               return true;
              }
        }

      delay(50);
    }
    for (int i = 0; i < 8; i++)
    {
      matrix[matrixNumber].setRow(0, i, smileyAnimationArray[i]);
    }
    
    for ( int k=0; k<10; k++)
    {
             if (checkDistanceSensorForTrash(trigPinArray[matrixNumber], echoPinArray[matrixNumber]) == true)
              {
               return true;
              }
      delay(50);
    }
    return false;  
}

//=========================================================================================================================================

boolean checkDistanceSensorForTrash(int trigPin, int echoPin)
{
  long duration;
  int distance;
  // Clears the trigPin
  digitalWrite(trigPin, LOW);
  delayMicroseconds(2);
  // Sets the trigPin on HIGH state for 10 micro seconds
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);
  // Reads the echoPin, returns the sound wave travel time in microseconds
  duration = pulseIn(echoPin, HIGH);
  // Calculating the distance
  distance= duration*0.034/2;
  /*
  int distance, duration;
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);
  duration = pulseIn(echoPin, HIGH);
  distance = (duration / 2) / 29.1;
*/
  //Serial.println(distance);
  
  if (distance < 20)
  {
    return true;
  }
  return false;
}

//=========================================================================================================================================

void displayInformationOnLCD(String textForLCD){
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print(textForLCD.substring(0, 16));
  lcd.setCursor(0, 1);
  lcd.print(textForLCD.substring(16, 32));
}

//=========================================================================================================================================

void sendUIDToVisualStudio(){

  String serNum[5];
  for (int i = 0; i < 1000; i++) 
  { 
    if(rfid.isCard()){
    if(rfid.readCardSerial()){
      String uid = "";
      char cardCode[20];
      sprintf(cardCode, "%u%u%u%u%u", rfid.serNum[0], rfid.serNum[1], rfid.serNum[2], rfid.serNum[3], rfid.serNum[4]);
      Serial.print(cardCode);
      Serial.print("#");
      displayInformationOnLCD("Scan uw product hierboven");     
      break;
         }
      }
    rfid.halt();
    delay(24);
  }
}
