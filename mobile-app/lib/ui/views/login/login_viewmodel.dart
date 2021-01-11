import 'package:flutter/material.dart';
import 'package:injectable/injectable.dart';
import 'package:project_trash/app/locator.dart';
import 'package:project_trash/models/login_response.dart';
import 'package:project_trash/services/authentication_service.dart';
import 'package:rounded_loading_button/rounded_loading_button.dart';
import 'package:stacked/stacked.dart';

const String LoginaBusyKey = 'login-key';

@singleton
class LoginViewModel extends BaseViewModel {
  AuthenticationService authenticationSerice = locator<AuthenticationService>();

  final TextEditingController emailController = TextEditingController();
  final TextEditingController passwordController = TextEditingController();

  final RoundedLoadingButtonController _submitBtnController =
      new RoundedLoadingButtonController();

  get submitBtnController => _submitBtnController;

  Future submit() async {
    authenticationSerice.login('doe@example.org', 'password').then((value) {
      _submitBtnController.success();
      _submitBtnController.reset();
    }).catchError((error) {
      _submitBtnController.reset();
    });

    // await ;
    // authenticationSerice.login(emailController.text, passwordController.text);
  }
}
