import 'dart:async';

import 'package:injectable/injectable.dart';
// import 'package:intl/intl.dart';
import 'package:project_trash/app/locator.dart';
import 'package:rounded_loading_button/rounded_loading_button.dart';
import 'package:stacked/stacked.dart';
import 'package:http/http.dart' as http;
// import 'package:meta/meta.dart';

import 'package:project_trash/models/user.dart';
import 'package:project_trash/services/authentication_service.dart';

import 'dart:developer' as developer;

import 'package:stacked_services/stacked_services.dart';

const String FetchViewDataBusyKey = 'view-data-key';
const String NfcLinkingBusyKey = 'nfc-linking-key';

@singleton
class HomeViewModel extends BaseViewModel {
  final AuthenticationService auth = locator<AuthenticationService>();
  final http.Client httpClient = http.Client();
  final NavigationService navigation = locator<NavigationService>();

  final RoundedLoadingButtonController _btnController =
      new RoundedLoadingButtonController();

  get btnController => _btnController;

  User user;

  Future initialise() async {
    setBusyForObject(FetchViewDataBusyKey, true);
    // await this.getCurrentUser();

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

  void linkNfc() async {
    setBusyForObject(NfcLinkingBusyKey, true);

    Timer(Duration(seconds: 3), () {
      _btnController.success();
      Timer(Duration(seconds: 2), () {
        _btnController.reset();
        navigation.navigateTo('/trashed-product-view');
      });
    });

    setBusyForObject(NfcLinkingBusyKey, false);
  }
}
