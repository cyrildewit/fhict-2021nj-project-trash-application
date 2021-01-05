import 'package:flutter/material.dart';
import 'package:injectable/injectable.dart';
import 'package:project_trash/app/locator.dart';
import 'package:project_trash/services/authentication_service.dart';
import 'package:stacked/stacked.dart';

@singleton
class LoginViewModel extends BaseViewModel {
  final authenticationSerice = locator<AuthenticationService>();

  final TextEditingController emailController = TextEditingController();
  final TextEditingController passwordController = TextEditingController();

  void submit() {
    authenticationSerice.login('doe@example.org', 'password');
    // authenticationSerice.login(emailController.text, passwordController.text);
  }
}
