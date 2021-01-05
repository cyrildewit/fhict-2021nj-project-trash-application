import 'package:injectable/injectable.dart';
import 'package:intl/intl.dart';
import 'package:project_trash/app/locator.dart';
import 'package:stacked/stacked.dart';
import 'package:http/http.dart' as http;

import 'package:project_trash/models/user.dart';
import 'package:project_trash/services/authentication_service.dart';

import 'dart:developer' as developer;

const String FetchViewDataBusyKey = 'view-data-key';

@singleton
class HomeViewModel extends BaseViewModel {
  AuthenticationService auth = locator<AuthenticationService>();
  final http.Client httpClient = http.Client();

  User user;

  Future initialise() async {
    setBusyForObject(FetchViewDataBusyKey, true);
    await this.getCurrentUser();

    developer.log('initialise');

    // final response = await this.httpClient.get('https://youtube.com');

    setBusyForObject(FetchViewDataBusyKey, false);
  }

  Future refreshViewData() async {
    setBusyForObject(FetchViewDataBusyKey, true);
    await this.getCurrentUser();

    setBusyForObject(FetchViewDataBusyKey, false);
  }

  Future getCurrentUser() async {
    this.user = await this.auth.currentUser();
  }

  void linkNfc() {
    // this.auth.user.balance += 20;
    // notifyListeners();
  }
}
