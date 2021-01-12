import 'package:auto_route/auto_route.dart';
import 'package:project_trash/services/authentication_service.dart';

import '../locator.dart';
import 'dart:developer' as developer;

class AuthGuard extends RouteGuard {
  @override
  Future<bool> canNavigate(
      dynamic navigator, String routeName, Object arguments) async {
    // AuthenticationService auth = locator<AuthenticationService>();

    developer.log('Auth guarding...');

    // return auth.check();

    // return prefs.getString('token_key') != null;

    return true;
  }
}
