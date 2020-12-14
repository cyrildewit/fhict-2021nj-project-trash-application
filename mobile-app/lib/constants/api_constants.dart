import 'dart:io';

class ApiConstants {
  static const BASE_SCHEME = 'http';
  static const BASE_HOST = '10.0.0.8';
  static const BASE_VERSION = 'v1';
}

// Map<String, String> requestHeaders(String token) {
Map<String, String> requestHeaders() {
  return {
    HttpHeaders.contentTypeHeader: 'application/json',
    HttpHeaders.acceptHeader: 'application/json',
    // HttpHeaders.authorizationHeader: 'Bearer $token'
  };
}
