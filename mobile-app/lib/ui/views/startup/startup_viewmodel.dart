import 'package:flutter/material.dart';
import 'package:project_trash/app/locator.dart';
import 'package:project_trash/models/user.dart';
import 'package:stacked/stacked.dart';
import 'package:stacked_services/stacked_services.dart';

class StartupViewModel extends IndexTrackingViewModel {
  User user;

  void initialise() {
    if (user == null) {
      navigateToLoginView();
    }
  }

  void navigateToLoginView() {
    locator<NavigationService>().navigateTo('/login-view');
  }

  void navigateToIndex(int value, context) {
    Navigator.pop(context);

    setIndex(value);
  }
}
