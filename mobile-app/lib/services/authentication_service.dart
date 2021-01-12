import 'package:project_trash/models/login_response.dart';
import 'package:project_trash/models/refresh_token_response.dart';
import 'package:project_trash/models/user.dart';
import 'package:injectable/injectable.dart';

import 'package:project_trash/app/locator.dart';
import 'package:project_trash/services/authentication_api_client.dart';
import 'package:stacked_services/stacked_services.dart';

import 'dart:developer' as developer;

@lazySingleton
class AuthenticationService {
  final AuthenticationApiClient authenticationApiClient =
      locator<AuthenticationApiClient>();

  final NavigationService navigationService = locator<NavigationService>();

  User user;
  String accessToken;

  Future login(String email, String password) async {
    try {
      LoginResponse loginResponse =
          await authenticationApiClient.login(email, password);
      this.accessToken = loginResponse.accessToken;
    } catch (error) {
      developer.log('error');
      Future.error(error);
    }
  }

  Future register(
      String name, String email, String password, String passwordConfirmation) {
    return authenticationApiClient.register(
        name, email, password, passwordConfirmation);
  }

  Future check() async {
    if (this.accessToken == null) {
      // developer.log("User is not authenticated");
      this.user = null;
      this.accessToken = null;

      // navigationService.navigateTo('/login-view');

      return false;
    } else {
      return true;
      // developer.log("User is authenticated");
    }
  }

  Future refreshToken() async {
    if (this.accessToken != null) {
      RefreshTokenResponse refreshTokenResponse =
          await authenticationApiClient.refreshToken(this.accessToken);

      this.accessToken = refreshTokenResponse.accessToken;
    }
  }

  Future<User> currentUser() async {
    if (this.user == null) {
      return await authenticationApiClient.currentUser();
    }

    return this.user;
  }
}
