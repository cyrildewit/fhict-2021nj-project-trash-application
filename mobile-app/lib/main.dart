import 'package:flutter/material.dart';
import 'package:stacked_themes/stacked_themes.dart';

import 'package:project_trash/main_app.dart';
import 'package:project_trash/app/locator.dart';

Future main() async {
  await ThemeManager.initialise();
  setupLocator();
  runApp(ProjectTrashApp());
}
