import 'package:flex_color_scheme/flex_color_scheme.dart';
import 'package:flutter/material.dart';
import 'package:stacked/stacked.dart';

import 'package:project_trash/app/locator.dart';
import 'package:project_trash/ui/views/trashed_product/trashed_product_viewmodel.dart';

class TrashedProductView extends StatelessWidget {
  final int productId;

  const TrashedProductView({
    Key key,
    this.productId,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return ViewModelBuilder<TrashedProductViewModel>.reactive(
      disposeViewModel: false,
      initialiseSpecialViewModelsOnce: true,
      viewModelBuilder: () => locator<TrashedProductViewModel>(),
      onModelReady: (model) async => model.initialise(productId),
      builder: (context, model, child) => Scaffold(
        appBar: AppBar(
          title: Text('Project TRASH'),
        ),
        body: !model.busy(ProductFetchBusyKey)
            ? Container(
                padding: EdgeInsets.all(12.0),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: <Widget>[
                    SizedBox(height: 12),
                    Row(
                      children: [
                        Expanded(
                          child: Center(
                            child: Text(
                              'U heeft het volgende product weggegooid:',
                              style: TextStyle(
                                fontSize: 18,
                                fontWeight: FontWeight.bold,
                                color: FlexColor.greenLightPrimary,
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
                          child: Center(
                            child: Text(
                              model.product.name ?? '',
                              style: TextStyle(
                                fontSize: 20,
                              ),
                            ),
                          ),
                        ),
                      ],
                    ),
                    SizedBox(height: 32),
                    Row(
                      children: [
                        Expanded(
                          child: Center(
                            child: Text(
                              'Het volgende bedrag is aan uw account toegevoegd:',
                              style: TextStyle(
                                fontSize: 18,
                                fontWeight: FontWeight.bold,
                                color: FlexColor.greenLightPrimary,
                              ),
                            ),
                          ),
                        ),
                      ],
                    ),
                    Row(
                      children: [
                        Expanded(
                          child: Center(
                            child: Text(
                              "\u20AC" +
                                  " ${model.product.getFormattedDepositAmount() ?? ''}",
                              style: TextStyle(
                                fontSize: 20,
                              ),
                            ),
                          ),
                        ),
                      ],
                    ),
                    SizedBox(
                      height: 32,
                    ),
                    Row(
                      children: [
                        Expanded(
                          child: Center(
                            child: RaisedButton(
                              child: Text('Teruggaan'),
                              onPressed: () {
                                Navigator.pop(context);
                              },
                            ),
                          ),
                        ),
                      ],
                    ),
                  ],
                ),
              )
            : Center(
                child: CircularProgressIndicator(),
              ),
      ),
    );
  }
}
