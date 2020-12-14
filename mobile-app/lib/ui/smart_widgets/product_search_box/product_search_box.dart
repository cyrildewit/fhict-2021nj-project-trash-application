import 'package:flutter/material.dart';
import 'package:project_trash/ui/smart_widgets/product_search_box/product_search_box_viewmodel.dart';
import 'package:material_design_icons_flutter/material_design_icons_flutter.dart';
import 'package:flutter_barcode_scanner/flutter_barcode_scanner.dart';

import 'package:stacked/stacked.dart';

class ProductSearchBox extends StatelessWidget {
  final TextEditingController searchQueryController;
  final FocusNode searchQueryFocus;
  final Function onSubmitted;
  final Function onChanged;
  final Function onBarcodeScanned;

  const ProductSearchBox({
    Key key,
    this.searchQueryController,
    this.searchQueryFocus,
    this.onSubmitted,
    this.onChanged,
    this.onBarcodeScanned,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return ViewModelBuilder<ProductSearchBoxViewModel>.reactive(
      viewModelBuilder: () => ProductSearchBoxViewModel(),
      onModelReady: (model) {
        // When switching tabs, the showClearButton value is lost.
        model.setShowClearButton(searchQueryController.text.isNotEmpty);
      },
      builder: (context, model, child) => Container(
        height: 50,
        decoration: BoxDecoration(
          color: Colors.white,
          borderRadius: BorderRadius.all(Radius.circular(6)),
          boxShadow: [
            BoxShadow(
              color: Colors.grey.withOpacity(0.3),
              spreadRadius: 1,
              blurRadius: 5,
              offset: Offset(0, 2),
            ),
          ],
        ),
        child: Row(
          children: [
            Expanded(
              child: Material(
                color: Colors.transparent,
                borderRadius: BorderRadius.only(
                  topLeft: Radius.circular(6),
                  bottomLeft: Radius.circular(6),
                ),
                child: InkWell(
                  borderRadius: BorderRadius.only(
                    topLeft: Radius.circular(6),
                    bottomLeft: Radius.circular(6),
                  ),
                  onTap: () {
                    searchQueryFocus.requestFocus();
                  },
                  child: Row(
                    crossAxisAlignment: CrossAxisAlignment.stretch,
                    children: <Widget>[
                      Container(
                        width: 50,
                        child: Icon(
                          Icons.search,
                          color: Color(0xFF255D92),
                          size: 25.0,
                        ),
                      ),
                      Expanded(
                        flex: 8,
                        child: TextField(
                          controller: searchQueryController,
                          focusNode: searchQueryFocus,
                          onSubmitted: onSubmitted,
                          onChanged: (value) {
                            model.setShowClearButton(value.isNotEmpty);

                            onChanged(value);
                          },
                          style: TextStyle(
                            fontSize: 14,
                            color: Colors.grey[600],
                          ),
                          textInputAction: TextInputAction.search,
                          decoration: InputDecoration(
                            hintText: 'Zoek op artikel, merk of artikelnummer.',
                            border: InputBorder.none,
                            focusedBorder: InputBorder.none,
                            enabledBorder: InputBorder.none,
                            errorBorder: InputBorder.none,
                            disabledBorder: InputBorder.none,
                          ),
                        ),
                      ),
                    ],
                  ),
                ),
              ),
            ),
            Container(
              width: 50,
              height: 50,
              child: SizedBox(
                width: 50,
                height: 50,
                child: ClipRRect(
                  borderRadius: BorderRadius.only(
                    topRight: Radius.circular(6),
                    bottomRight: Radius.circular(6),
                  ),
                  child: Material(
                    color: Colors.transparent,
                    child: !model.showClearButton
                        ? IconButton(
                            icon: Icon(MdiIcons.qrcodeScan),
                            iconSize: 24.0,
                            color: Color(0xFF255D92),
                            onPressed: () async {
                              String barcodeScanRes =
                                  await FlutterBarcodeScanner.scanBarcode(
                                '#004297',
                                'Cancel',
                                true,
                                ScanMode.BARCODE,
                              );

                              if (barcodeScanRes != "-1") {
                                onBarcodeScanned(barcodeScanRes);
                              }
                            },
                          )
                        : IconButton(
                            icon: Icon(Icons.clear),
                            iconSize: 24.0,
                            color: Colors.red[400],
                            onPressed: () async {
                              searchQueryController.clear();
                              model.setShowClearButton(false);
                            },
                          ),
                  ),
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }
}
