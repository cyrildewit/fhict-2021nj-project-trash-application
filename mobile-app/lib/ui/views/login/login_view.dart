import 'package:flutter/material.dart';
import 'package:rounded_loading_button/rounded_loading_button.dart';
import 'package:stacked/stacked.dart';

import 'package:project_trash/app/locator.dart';
import 'package:project_trash/ui/views/login/login_viewmodel.dart';

class LoginView extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return ViewModelBuilder<LoginViewModel>.reactive(
      disposeViewModel: false,
      initialiseSpecialViewModelsOnce: true,
      builder: (context, model, child) => Container(
        padding: EdgeInsets.symmetric(horizontal: 24),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: <Widget>[
            SizedBox(height: 12),
            Text(
              'Login page',
              style: TextStyle(
                fontSize: 20,
                fontWeight: FontWeight.bold,
              ),
            ),
            SizedBox(height: 24),
            Container(
              child: new TextField(
                controller: model.emailController,
                decoration: InputDecoration(labelText: 'E-mailadres'),
              ),
            ),
            SizedBox(height: 12),
            Container(
              child: new TextField(
                controller: model.passwordController,
                decoration: InputDecoration(labelText: 'Wachtwoord'),
                obscureText: true,
              ),
            ),
            SizedBox(height: 24),
            RoundedLoadingButton(
              child: Text(
                'Inloggen',
                style: TextStyle(color: Colors.white),
              ),
              controller: model.submitBtnController,
              onPressed: model.submit,
            ),
          ],
        ),
      ),
      viewModelBuilder: () => locator<LoginViewModel>(),
    );
  }
}
