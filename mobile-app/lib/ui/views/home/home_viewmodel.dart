import 'dart:async';

import 'package:injectable/injectable.dart';
// import 'package:intl/intl.dart';
import 'package:project_trash/app/locator.dart';
import 'package:project_trash/app/router.gr.dart';
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
  final AuthenticationService authenticationService =
      locator<AuthenticationService>();
  final NavigationService navigation = locator<NavigationService>();

  final RoundedLoadingButtonController _btnController =
      new RoundedLoadingButtonController();

  get btnController => _btnController;

  User user;

  Future initialise() async {
    setBusyForObject(FetchViewDataBusyKey, true);

    // this.user = await authenticationService.currentUser();

    // this.auth.check();

    // await this.getCurrentUser();

    setBusyForObject(FetchViewDataBusyKey, false);
  }

  Future refreshViewData() async {
    setBusyForObject(FetchViewDataBusyKey, true);

    await getCurrentUser();

    developer.log(user.balance.toString());
    developer.log(user.toJson().toString());

    // notifyListeners();

    setBusyForObject(FetchViewDataBusyKey, false);
  }

  Future getCurrentUser() async {
    this.user = await authenticationService.currentUser();
  }

  void linkNfc() async {
    setBusyForObject(NfcLinkingBusyKey, true);

    Timer(Duration(seconds: 3), () {
      _btnController.success();
      Timer(Duration(seconds: 2), () {
        _btnController.reset();
        navigation.navigateTo('/trashed-product-view',
            arguments: TrashedProductViewArguments(productId: 1));
      });
    });

    setBusyForObject(NfcLinkingBusyKey, false);
  }
}
