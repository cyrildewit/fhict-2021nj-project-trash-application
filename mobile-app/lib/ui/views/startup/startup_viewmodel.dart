import 'package:flutter/material.dart';
import 'package:project_trash/app/locator.dart';
import 'package:project_trash/models/user.dart';
import 'package:project_trash/services/authentication_service.dart';
import 'package:stacked/stacked.dart';
import 'package:stacked_services/stacked_services.dart';

const String FetchUserBusyKey = 'fetch-user-key';

class StartupViewModel extends IndexTrackingViewModel {
  AuthenticationService auth = locator<AuthenticationService>();
  NavigationService navigation = locator<NavigationService>();

  User user;

  Future initialise() async {
    // await this.auth.check();

    await this.getCurrentUser();

    notifyListeners();
  }

  void navigateToLoginView() {
    navigation.navigateTo('/login-view');
  }

  void navigateToIndex(int value, context) {
    Navigator.pop(context);

    setIndex(value);
  }

  Future getCurrentUser() async {
    this.user = await this.auth.currentUser();
  }
}
