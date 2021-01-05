import 'package:project_trash/models/user.dart';
import 'package:injectable/injectable.dart';

import 'package:project_trash/app/locator.dart';
import 'package:project_trash/models/product_paginator.dart';
import 'package:project_trash/services/user_api_client.dart';

@lazySingleton
class UserService {
  final UserApiClient userApiClient = locator<UserApiClient>();

  // Future<ProductPaginator> fetchUserById(
  //     {int id, Map<String, dynamic> queryParameters}) async {
  //   return userApiClient
  //       .fetchUserById({id: id, queryParameters: queryParameters});
  // }
}
