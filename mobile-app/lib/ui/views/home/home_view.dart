import 'package:flutter/material.dart';
import 'package:stacked/stacked.dart';

import 'package:project_trash/app/locator.dart';
import 'package:project_trash/ui/views/home/home_viewmodel.dart';

class HomeView extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return ViewModelBuilder<HomeViewModel>.reactive(
      disposeViewModel: false,
      initialiseSpecialViewModelsOnce: true,
      viewModelBuilder: () => locator<HomeViewModel>(),
      onModelReady: (model) async => await model.initialise(),
      builder: (context, model, child) => !model.busy(FetchViewDataBusyKey)
          ? RefreshIndicator(
              onRefresh: model.refreshViewData,
              child: SingleChildScrollView(
                physics: AlwaysScrollableScrollPhysics(),
                child: Container(
                  padding: EdgeInsets.symmetric(horizontal: 12.0),
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: <Widget>[
                      SizedBox(height: 24),
                      Row(
                        children: [
                          Expanded(
                            child: Card(
                              child: Padding(
                                padding: EdgeInsets.symmetric(vertical: 70),
                                child: Row(
                                  children: <Widget>[
                                    Expanded(
                                      child: Container(
                                        child: Column(
                                          crossAxisAlignment:
                                              CrossAxisAlignment.start,
                                          children: <Widget>[
                                            Center(
                                              child: Text(
                                                'Uw saldo',
                                                style: TextStyle(
                                                  fontSize: 18,
                                                ),
                                              ),
                                            ),
                                            SizedBox(height: 12),
                                            Center(
                                              child: Text(
                                                "\u20AC" +
                                                    " ${model.user?.getFormattedBalance() ?? '0,00'}",
                                                style: TextStyle(
                                                  fontSize: 32,
                                                  fontWeight: FontWeight.bold,
                                                ),
                                              ),
                                            ),
                                          ],
                                        ),
                                      ),
                                    ),
                                  ],
                                ),
                              ),
                            ),
                          ),
                        ],
                      ),
                      SizedBox(height: 24),
                      Row(
                        children: [
                          Expanded(
                            child: RaisedButton(
                              padding: EdgeInsets.symmetric(vertical: 16),
                              child: Text('NFC identificatie aanzetten'),
                              onPressed: () {
                                model.linkNfc();
                              },
                            ),
                          ),
                        ],
                      ),
                    ],
                  ),
                ),
              ),
            )
          : Center(
              child: CircularProgressIndicator(),
            ),
    );
  }
}
