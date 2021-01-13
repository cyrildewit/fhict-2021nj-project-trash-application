import 'dart:convert';
import 'dart:io';

import 'package:injectable/injectable.dart';
import 'package:project_trash/app/locator.dart';
import 'package:project_trash/constants/api_constants.dart';
import 'package:project_trash/models/product.dart';
import 'package:project_trash/models/user.dart';
import 'package:project_trash/services/authentication_service.dart';
import 'package:project_trash/services/product_service.dart';
import 'package:http/http.dart' as http;
import 'package:stacked/stacked.dart';
// import 'dart:io';
// import 'package:meta/meta.dart';
import 'dart:developer' as developer;

const String ProductFetchBusyKey = 'product-fetch-key';

@singleton
class TrashedProductViewModel extends BaseViewModel {
  final ProductService productService = locator<ProductService>();
  final AuthenticationService authenticationService =
      locator<AuthenticationService>();

  final http.Client httpClient = http.Client();

  Product product;

  Future initialise(int productId) async {
    setBusyForObject(ProductFetchBusyKey, true);

    product = await productService
        .fetchProductById(id: productId, queryParameters: {});

    await fakeStoreDiscardedWasteRecord();

    notifyListeners();

    setBusyForObject(ProductFetchBusyKey, false);
  }

  Future fakeStoreDiscardedWasteRecord() async {
    final url = makeUri(
      path: '/users/findByNFC/default/discarded-waste-records',
    );

    await this.httpClient.post(
          url,
          headers: {
            HttpHeaders.acceptHeader: 'application/json',
            HttpHeaders.contentTypeHeader: 'application/json; charset=UTF-8',
            "X-TrashCan-UUID": "ec2864b2-f704-4aa9-8dce-ac2ae2c464d9",
          },
          body: jsonEncode(<String, String>{
            "barcode": "5449000111678",
          }),
        );
  }

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
}
