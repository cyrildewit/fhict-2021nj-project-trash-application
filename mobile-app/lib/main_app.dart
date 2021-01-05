import 'package:flex_color_scheme/flex_color_scheme.dart';
import 'package:flutter/material.dart' hide Router;
import 'package:stacked_services/stacked_services.dart';

import 'package:project_trash/app/locator.dart';
import 'package:project_trash/app/router.gr.dart';

class ProjectTrashApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Project TRASH',
      debugShowCheckedModeBanner: false,
      theme: FlexColorScheme.light(
              colors: FlexColor.schemes[FlexScheme.green].light)
          .toTheme,
      onGenerateRoute: Router(),
      navigatorKey: locator<NavigationService>().navigatorKey,
    );
  }
}
