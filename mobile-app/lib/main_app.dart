import 'package:auto_route/auto_route.dart';
import 'package:flex_color_scheme/flex_color_scheme.dart';
import 'package:flutter/material.dart' hide Router;
import 'package:stacked_services/stacked_services.dart';

import 'package:project_trash/app/locator.dart';
import 'package:project_trash/app/router.gr.dart';

import 'app/route_guards/auth_guard.dart';

class ProjectTrashApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Project TRASH',
      debugShowCheckedModeBanner: false,
      theme: FlexColorScheme.light(
              colors: FlexColor.schemes[FlexScheme.green].light)
          .toTheme,
      builder: ExtendedNavigator<Router>(
        router: Router(),
        guards: [AuthGuard()],
        navigatorKey: locator<NavigationService>().navigatorKey,
      ),
    );
  }
}
