#include <LiquidCrystal.h>
#include <LedControl.h>
#include <SPI.h>
#include <RFID.h>

#define SS_PIN 4
#define RST_PIN 5

RFID rfid(SS_PIN,RST_PIN);

String serNum[5];

int trigPin0 = 47;
int echoPin0 = 46;
int trigPin1 = 49;
int echoPin1 = 48;
int trigPin2 = 41;
int echoPin2 = 40;
int trigPin3 = 39;
int echoPin3 = 38;

int trigArray[] = {trigPin0, trigPin1, trigPin2, trigPin3};
int echoArray[] = {echoPin0, echoPin1, echoPin2, echoPin3};

int count = 4;
int duration;

boolean klaar = false;

String commandStringLCD = "";
String inputStringLCD = "";
boolean stringCompleteLCD = false;
LiquidCrystal lcd(3, 2, 12, 11, 10, 9);
String inputString = "";
boolean stringComplete = false;
String commandString = "";
boolean ledState[] = {false, false, false, false};
int delayT = 50;
int delaytime = 100;
int input;

byte pijlOmhoog[15][8] = {{B00000000, B00000000, B00000000, B00000000, B00000000, B00000000, B00000000, B00011000},
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

byte smiley[8] = {B00000000,B00111100,B01000010,B00000000,B00000000,B01100110,B01100110,B00000000};
byte off[8] = {B00000000, B00000000, B00000000, B00000000, B00000000, B00000000, B00000000, B00000000};
LedControl lc2 = LedControl(22, 24, 23, 0);
LedControl lc = LedControl(25, 27, 26, 0);
LedControl lc3 = LedControl(28, 30, 29, 0);
LedControl lc4 = LedControl(31, 33, 32, 0);
LedControl matrix[] = {lc, lc3, lc2, lc4};

void serialEvent()
{
  while (Serial.available())
  {
    // get the new byte:
    char inChar = (char)Serial.read();
    // add it to the inputString:
    inputString += inChar;
    // if the incoming character is a newline, set a flag
    // so the main loop can do something about it:
    if (inChar == '\n')
    {
      stringComplete = true;
    }
  }
}

void displayText()
{
  lcd.clear();
  lcd.print(commandStringLCD.substring(0, 16));
  lcd.setCursor(0, 1);
  lcd.print(commandStringLCD.substring(16, 32));
}

void getCommand()
{
  if (inputString.length() > 0)
  {
    commandString = inputString.substring(1, inputString.length() - 1);
  }
}
void getCommandStringLCD()
{
  commandStringLCD = commandString.substring(1, commandString.length());
}

void bewegen(int choose, int trigPin, int echoPin)
{
  for (int x = 0; x < 5; x++)
  {
    if (klaar)
    {
      klaar = false;
      break;
    }
    for (int i = 0; i < 15; i++)
    {
      if (useSensor(trigPin, echoPin) == true)
      {
        lcdStatieGeld();
      }
      for (int j = 0; j < 8; j++)
      {

        matrix[choose].setRow(0, j, pijlOmhoog[i][j]);
      }

      delay(delayT);
    }
    for (int i = 0; i < 8; i++)
    {
      matrix[choose].setRow(0, i, smiley[i]);
    }
    for ( int k=0; k<10; k++){
      delay(100);
      if (useSensor(trigPin, echoPin) == true)
      {
        lcdStatieGeld();
      }
    }
  }
  matrix[choose].clearDisplay(0);
  sendUIDToVisualStudio();
}

boolean useSensor(int trigPin, int echoPin)
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
  
  if (distance < 21)
  {
    return true;
  }
  return false;
}

void lcdStatieGeld()
{
  //laat op lcd statiegeld zien.
  lcd.clear();
  lcd.print("Je krijgt");
  lcd.setCursor(0, 1);
  lcd.print("15 cent");
  klaar = true;
}


void sendUIDToVisualStudio(){
    
  for (int i = 0; i < 1000; i++) { 
    if(rfid.isCard()){
    if(rfid.readCardSerial()){
      String uid = "";
      char cardCode[20];
      sprintf(cardCode, "%u%u%u%u%u", rfid.serNum[0], rfid.serNum[1], rfid.serNum[2], rfid.serNum[3], rfid.serNum[4]);
      Serial.print(cardCode);
      Serial.print("#");
      i = 1000;
         }
      }
    rfid.halt();
    delay(10);
  }
}

void setup()
{
  // put your setup code here, to run once:
  Serial.begin(9600);
    SPI.begin();
    rfid.init();
  for (int i = 0; i < 4; i++)
  {
    matrix[i].shutdown(0, false);  //The MAX72XX is in power-saving mode on startup
    matrix[i].setIntensity(0, 15); // Set the brightness to maximum value
    matrix[i].clearDisplay(0);

    for (int i = 0; i < count; i++)
    {
      pinMode(trigArray[i], OUTPUT);
      pinMode(echoArray[i], INPUT);
    }
  }
  lcd.begin(16, 2);
}

void loop()
{
  if (stringComplete)
  {
    stringComplete = false;
    getCommand();

    String temp = commandString.substring(0, 1);

    if (temp == "1")
    {
      getCommandStringLCD();
      displayText();
    }
    if (commandString.equals("0"))
    {
      bewegen(0, trigArray[0], echoArray[0]);
    }

    if (commandString.equals("1"))
    {
      bewegen(1, trigArray[1], echoArray[1]);
    }

    if (commandString.equals("2"))
    {
      bewegen(2, trigArray[2], echoArray[2]);
    }

    if (commandString.equals("3"))
    {
      bewegen(3, trigArray[3], echoArray[3]);
    }

    inputString = "";
  } 
  
  
}
