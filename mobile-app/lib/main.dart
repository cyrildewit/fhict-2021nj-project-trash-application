import 'package:flutter/material.dart';

import 'package:project_trash/main_app.dart';
import 'package:project_trash/app/locator.dart';

Future main() async {
  setupLocator();
  runApp(ProjectTrashApp());
}
