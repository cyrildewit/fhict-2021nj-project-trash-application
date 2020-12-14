import 'package:flutter/material.dart' hide Router;
import 'package:stacked_services/stacked_services.dart';
import 'package:stacked_themes/stacked_themes.dart';

import 'package:project_trash/app/locator.dart';
import 'package:project_trash/app/router.gr.dart';
import 'package:project_trash/app/theme_setup.dart';

class ProjectTrashApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return ThemeBuilder(
      themes: getThemes(),
      builder: (context, regularTheme, darkTheme, themeMode) => MaterialApp(
        title: 'Project TRASH',
        debugShowCheckedModeBanner: false,
        theme: regularTheme,
        darkTheme: darkTheme,
        themeMode: themeMode,
        onGenerateRoute: Router(),
        navigatorKey: locator<NavigationService>().navigatorKey,
      ),
    );
  }
}
