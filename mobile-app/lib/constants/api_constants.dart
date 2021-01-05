import 'dart:io';

import 'package:project_trash/app/locator.dart';
import 'package:project_trash/services/authentication_service.dart';

class ApiConstants {
  static const BASE_SCHEME = 'http';
  static const BASE_HOST = '10.0.0.8';
  static const BASE_VERSION = 'v1';
}

Map<String, String> requestHeaders() {
  return {
    HttpHeaders.contentTypeHeader: 'application/json',
    HttpHeaders.acceptHeader: 'application/json',
  };
}

Map<String, String> authRequestHeaders() {
  AuthenticationService authService = locator<AuthenticationService>();

  String token = authService.accessToken;

  return {
    HttpHeaders.authorizationHeader: 'Bearer $token',
  };
}
