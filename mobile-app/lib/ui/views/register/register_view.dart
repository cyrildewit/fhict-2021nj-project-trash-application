import 'package:flutter/material.dart';
import 'package:stacked/stacked.dart';

import 'package:project_trash/app/locator.dart';
import 'package:project_trash/ui/views/register/register_viewmodel.dart';

class RegisterView extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return ViewModelBuilder<RegisterViewModel>.reactive(
      disposeViewModel: false,
      initialiseSpecialViewModelsOnce: true,
      builder: (context, model, child) => Container(
        padding: EdgeInsets.all(12.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: <Widget>[
            SizedBox(height: 12),
            Text('Register page'),
          ],
        ),
      ),
      viewModelBuilder: () => locator<RegisterViewModel>(),
    );
  }
}
