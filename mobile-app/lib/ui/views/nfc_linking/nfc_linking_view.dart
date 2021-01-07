import 'package:flutter/material.dart';
import 'package:stacked/stacked.dart';

import 'package:project_trash/app/locator.dart';
import 'package:project_trash/ui/views/nfc_linking/nfc_linking_viewmodel.dart';

class NfcLinkingView extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return ViewModelBuilder<NfcLinkingViewModel>.reactive(
      disposeViewModel: false,
      initialiseSpecialViewModelsOnce: true,
      viewModelBuilder: () => locator<NfcLinkingViewModel>(),
      onModelReady: (model) async => model.initialise(),
      builder: (context, model, child) => Scaffold(
        appBar: AppBar(
          title: Text('Project TRASH'),
        ),
        body: Container(
          padding: EdgeInsets.all(12.0),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: <Widget>[
              SizedBox(height: 12),
              Text('NfcLinking page'),
            ],
          ),
        ),
      ),
    );
  }
}
