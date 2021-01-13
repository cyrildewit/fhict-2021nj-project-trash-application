import 'package:flutter/material.dart';
import 'package:injectable/injectable.dart';
import 'package:project_trash/app/locator.dart';
import 'package:project_trash/services/authentication_service.dart';
import 'package:rounded_loading_button/rounded_loading_button.dart';
import 'package:stacked/stacked.dart';
import 'package:stacked_services/stacked_services.dart';

@singleton
class LoginViewModel extends BaseViewModel {
  final AuthenticationService authenticationSerice =
      locator<AuthenticationService>();
  final NavigationService navigationService = locator<NavigationService>();

  final TextEditingController emailController = TextEditingController();
  final TextEditingController passwordController = TextEditingController();

  final RoundedLoadingButtonController _submitBtnController =
      new RoundedLoadingButtonController();

  get submitBtnController => _submitBtnController;

  Future submit() async {
    authenticationSerice
        .login(emailController.text, passwordController.text)
        .then((value) {
      _submitBtnController.success();
      emailController.clear();
      passwordController.clear();
      _submitBtnController.reset();
    }).catchError((error) {
      _submitBtnController.reset();
    });
  }
}
