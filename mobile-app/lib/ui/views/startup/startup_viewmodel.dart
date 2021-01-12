import 'package:flutter/material.dart';
import 'package:project_trash/app/locator.dart';
import 'package:project_trash/models/user.dart';
import 'package:project_trash/services/authentication_service.dart';
import 'package:stacked/stacked.dart';
import 'package:stacked_services/stacked_services.dart';

const String FetchUserBusyKey = 'fetch-user-key';

class StartupViewModel extends IndexTrackingViewModel {
  final AuthenticationService authenticationService =
      locator<AuthenticationService>();
  final NavigationService navigationService = locator<NavigationService>();

  User user;

  Future initialise() async {
    await this.authenticationService.check();

    await getCurrentUser();

    notifyListeners();
  }

  void navigateToIndex(int value, context) {
    Navigator.pop(context);

    setIndex(value);
  }

  Future getCurrentUser() async {
    this.user = await this.authenticationService.currentUser();
  }
}
