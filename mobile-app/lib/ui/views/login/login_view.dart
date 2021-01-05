import 'package:flutter/material.dart';
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
        padding: EdgeInsets.all(12.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: <Widget>[
            // SizedBox(height: 12),
            // Text('Login page'),
            Container(
              child: new TextField(
                controller: model.emailController,
                decoration: InputDecoration(labelText: 'E-mailadres'),
              ),
            ),
            Container(
              child: new TextField(
                controller: model.passwordController,
                decoration: InputDecoration(labelText: 'Wachtwoord'),
                obscureText: true,
              ),
            ),
            SizedBox(height: 12),
            RaisedButton(
              onPressed: model.submit,
              child: Text('Inloggen'),
              autofocus: false,
            ),
          ],
        ),
      ),
      viewModelBuilder: () => locator<LoginViewModel>(),
    );
  }
}
