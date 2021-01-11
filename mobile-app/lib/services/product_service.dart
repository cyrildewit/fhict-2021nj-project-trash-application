import 'package:project_trash/models/product.dart';
import 'package:injectable/injectable.dart';

import 'package:project_trash/app/locator.dart';
import 'package:project_trash/models/product_paginator.dart';
import 'package:project_trash/services/product_api_client.dart';

import 'authentication_service.dart';

@lazySingleton
class ProductService {
  final ProductApiClient productApiClient = locator<ProductApiClient>();
  final AuthenticationService auth = locator<AuthenticationService>();

  Future<ProductPaginator> fetchProducts(
      {Map<String, dynamic> queryParameters}) async {
    return productApiClient.fetchProducts(queryParameters);
  }

  Future<Product> fetchProductByBarcode(
      {String barcode, Map<String, dynamic> queryParameters}) async {
    return productApiClient.fetchProductByBarcode(
        barcode: barcode, queryParameters: queryParameters);
  }

  Future<Product> fetchProductById(
      {int id, Map<String, dynamic> queryParameters}) async {
    return productApiClient.fetchProductById(
        id: id, queryParameters: queryParameters);
  }
}
