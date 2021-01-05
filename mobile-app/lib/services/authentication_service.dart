import 'package:project_trash/models/login_response.dart';
import 'package:project_trash/models/user.dart';
import 'package:injectable/injectable.dart';

import 'package:project_trash/app/locator.dart';
import 'package:project_trash/services/authentication_api_client.dart';

@lazySingleton
class AuthenticationService {
  final AuthenticationApiClient authenticationApiClient =
      locator<AuthenticationApiClient>();

  User user;
  String accessToken;

  Future<User> login(String email, String password) async {
    LoginResponse loginResponse =
        await authenticationApiClient.login(email, password);

    this.accessToken = loginResponse.accessToken;

    return this.currentUser();
  }

  // Future<User> register(String email, String password) {
  //   return authenticationApiClient.login(email, password);
  // }

  // void check() {
  //   if (this.token == null) {
  //     // logout and redirect
  //   }
  // }

  Future<User> currentUser() async {
    if (this.user != null) {
      return this.user;
    }

    return await authenticationApiClient.currentUser();
  }
}
