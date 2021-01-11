import 'package:injectable/injectable.dart';
import 'package:project_trash/app/locator.dart';
import 'package:project_trash/models/product.dart';
import 'package:project_trash/services/product_service.dart';
import 'package:stacked/stacked.dart';
// import 'dart:io';
// import 'package:meta/meta.dart';

const String ProductFetchBusyKey = 'product-fetch-key';

@singleton
class TrashedProductViewModel extends BaseViewModel {
  ProductService productService = locator<ProductService>();

  Product product;

  Future initialise(int productId) async {
    setBusyForObject(ProductFetchBusyKey, true);

    product = await productService
        .fetchProductById(id: productId, queryParameters: {});

    setBusyForObject(ProductFetchBusyKey, false);
  }
}
