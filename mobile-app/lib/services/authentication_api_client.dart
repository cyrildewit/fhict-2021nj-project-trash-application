import 'dart:async';
import 'dart:convert';
import 'dart:io';

import 'package:project_trash/models/login_response.dart';
import 'package:project_trash/models/refresh_token_response.dart';
import 'package:project_trash/models/user.dart';
import 'package:injectable/injectable.dart';
import 'package:http/http.dart' as http;

import 'package:project_trash/constants/api_constants.dart';

import 'dart:developer' as developer;

@lazySingleton
class AuthenticationApiClient {
  final http.Client httpClient = http.Client();

  Uri makeUri({
    String path,
    Map<String, dynamic /*String|Iterable<String>*/ > queryParameters,
  }) {
    return Uri(
      scheme: ApiConstants.BASE_SCHEME,
      host: ApiConstants.BASE_HOST,
      path: '/api/' + ApiConstants.BASE_VERSION + path,
      queryParameters: queryParameters,
    );
  }

  Future<LoginResponse> login(String email, String password) async {
    final url = makeUri(
      path: '/auth/user/login',
    );

    // developer.log(url.toString());

    final response = await this.httpClient.post(
          url,
          headers: {
            HttpHeaders.acceptHeader: 'application/json',
            HttpHeaders.contentTypeHeader: 'application/json; charset=UTF-8',
          },
          body: jsonEncode(<String, String>{
            "email": email,
            "password": password,
          }),
        );

    final loginResponseJson = jsonDecode(response.body);

    // developer.log(email);
    // developer.log(password);

    // developer.log(response.statusCode.toString());
    // developer.log(response.body);

    return LoginResponse.fromJson(loginResponseJson);
  }

  Future register(String name, String email, String password,
      String passwordConfirmation) async {
    final url = makeUri(
      path: '/auth/user/register',
    );

    developer.log(url.toString());

    final response = await this.httpClient.post(
          url,
          headers: {
            HttpHeaders.acceptHeader: 'application/json',
            HttpHeaders.contentTypeHeader: 'application/json; charset=UTF-8',
          },
          body: jsonEncode(<String, String>{
            "name": name,
            "email": email,
            "password": password,
            "password_confirmation": passwordConfirmation,
          }),
        );

    // final loginResponseJson = jsonDecode(response.body);

    // developer.log(email);
    // developer.log(password);
    // developer.log(passwordConfirmation);

    // developer.log(response.statusCode.toString());
    // developer.log(response.body);

    // return LoginResponse.fromJson(loginResponseJson);
  }

  Future<RefreshTokenResponse> refreshToken(String acceessToken) async {
    final url = makeUri(
      path: '/auth/user/refresh',
    );

    final response = await this.httpClient.post(
      url,
      headers: {
        ...requestHeaders(),
        HttpHeaders.authorizationHeader: 'Bearer $acceessToken',
      },
    );

    final refreshTokenResponseJson = jsonDecode(response.body);

    return RefreshTokenResponse.fromJson(refreshTokenResponseJson);
  }

  Future<User> currentUser() async {
    final url = makeUri(
      path: '/auth/user/me',
    );

    final response = await this.httpClient.post(
      url,
      headers: {
        ...requestHeaders(),
        ...authRequestHeaders(),
      },
    );

    developer.log(response.statusCode.toString());
    developer.log(response.body);

    final userJson = jsonDecode(response.body)['data'];

    return User.fromJson(userJson);
  }
}
