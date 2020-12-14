import 'dart:async';
import 'dart:convert';

import 'package:project_trash/models/product.dart';
import 'package:injectable/injectable.dart';
import 'package:http/http.dart' as http;

import 'package:project_trash/models/product_paginator.dart';
import 'package:project_trash/constants/api_constants.dart';

import 'dart:developer' as developer;

@lazySingleton
class ProductApiClient {
  final http.Client httpClient = http.Client();

  Uri makeUri({
    String path,
    Map<String, dynamic /*String|Iterable<String>*/ > queryParameters,
  }) {
    return Uri(
      scheme: ApiConstants.BASE_SCHEME,
      host: ApiConstants.BASE_HOST,
      path: ApiConstants.BASE_VERSION + path,
      queryParameters: queryParameters,
    );
  }

  Future<ProductPaginator> fetchProducts(
      Map<String, dynamic> queryParameters) async {
    final url = makeUri(
      path: '/products',
      queryParameters: queryParameters,
    );

    // try {
    final response = await this.httpClient.get(
          url,
          headers: requestHeaders(),
        );

    final productsJson = jsonDecode(response.body);

    developer.log(response.body);

    return ProductPaginator.fromJson(productsJson);
    // } on SocketException {
    //   developer.log('No Internet connection 😑');
    // } on HttpException {
    //   developer.log("Couldn't find the post 😱");
    // } on FormatException {
    //   developer.log("Bad response format 👎");
    // }
  }

  Future<Product> fetchProductByBarcode(
      {String barcode, Map<String, dynamic> queryParameters}) async {
    queryParameters['filter[barcode]'] = barcode;

    final url = makeUri(
      path: '/products',
      // queryParameters: queryParameters,
      queryParameters: {
        'include': 'languages',
      },
    );

    // try {
    final response = await this.httpClient.get(
          url,
          headers: requestHeaders(),
        );

    final productJson = jsonDecode(response.body)['data'][0];

    return Product.fromJson(productJson);
    // } on SocketException {
    //   developer.log('No Internet connection 😑');
    // } on HttpException {
    //   developer.log("Couldn't find the post 😱");
    // } on FormatException {
    //   developer.log("Bad response format 👎");
    // }
  }

  Future<Product> fetchProductById(
      {int id, Map<String, dynamic> queryParameters}) async {
    final url = makeUri(
      path: '/products/$id',
      queryParameters: queryParameters,
    );

    developer.log(queryParameters['include']);
    developer.log(url.toString());

    // try {
    final response = await this.httpClient.get(
          url,
          headers: requestHeaders(),
        );

    developer.log(response.body);

    final productJson = jsonDecode(response.body)['data'];

    return Product.fromJson(productJson);
    // } on SocketException {
    //   developer.log('No Internet connection 😑');
    // } on HttpException {
    //   developer.log("Couldn't find the post 😱");
    // } on FormatException {
    //   developer.log("Bad response format 👎");
    // }
  }
}
