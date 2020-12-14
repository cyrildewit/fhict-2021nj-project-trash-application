import 'package:flutter/material.dart';
import 'package:stacked/stacked.dart';

import 'package:project_trash/app/locator.dart';
import 'package:project_trash/ui/views/account/account_viewmodel.dart';

class AccountView extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return ViewModelBuilder<AccountViewModel>.reactive(
      disposeViewModel: false,
      initialiseSpecialViewModelsOnce: true,
      builder: (context, model, child) => Container(
        padding: EdgeInsets.all(12.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: <Widget>[
            SizedBox(height: 12),
            Text('Account page'),
          ],
        ),
      ),
      viewModelBuilder: () => locator<AccountViewModel>(),
    );
  }
}
