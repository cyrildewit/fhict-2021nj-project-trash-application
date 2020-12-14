import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';

List<ThemeData> getThemes() {
  return [
    ThemeData(
      backgroundColor: Color(0xFFFBF9F4),
      primaryColor: Color(0xFF255D92),
      textTheme: GoogleFonts.nunitoTextTheme(),
    ),
    ThemeData(backgroundColor: Colors.black, accentColor: Colors.red),
  ];
}
