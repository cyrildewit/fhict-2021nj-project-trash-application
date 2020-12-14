import 'package:flutter/material.dart';
import 'package:flutter_svg/svg.dart';
import 'package:stacked/stacked.dart';

import 'package:project_trash/ui/views/startup/startup_viewmodel.dart';

class StartupView extends StatelessWidget {
  const StartupView({Key key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return ViewModelBuilder<StartupViewModel>.reactive(
      builder: (context, model, child) => Scaffold(
        appBar: AppBar(),
        // appBar: AppBar(
        //   backgroundColor: Colors.white,
        //   // title: Row(
        //   //   mainAxisAlignment: MainAxisAlignment.center,
        //   //   children: <Widget>[
        //   //     SizedBox(
        //   //       height: 24,
        //   //       child: SvgPicture.asset(
        //   //         'assets/images/logo.svg',
        //   //         semanticsLabel: 'Project TRASH Logo',
        //   //       ),
        //   //     ),
        //   //   ],
        //   // ),
        // ),
        drawer: Drawer(
          child: ListView(
            padding: EdgeInsets.zero,
            children: const <Widget>[
              DrawerHeader(
                decoration: BoxDecoration(
                  color: Colors.blue,
                ),
                child: Text(
                  'Saldo',
                  style: TextStyle(
                    color: Colors.white,
                    fontSize: 24,
                  ),
                ),
              ),
              ListTile(
                leading: Icon(Icons.message),
                title: Text('Saldo'),
                // onTap: () {
                //   locator<NavigationService>().navigateTo(
                //     '/product-show-view',
                //     // arguments: ProductShowViewArguments(
                //     //   productId: id,
                //     // ),
                //   );
                // },
              ),
              ListTile(
                leading: Icon(Icons.message),
                title: Text('Statistieken'),
                // onTap: () {
                //   locator<NavigationService>().navigateTo(
                //     '/product-show-view',
                //     // arguments: ProductShowViewArguments(
                //     //   productId: id,
                //     // ),
                //   );
                // },
              ),
              ListTile(
                leading: Icon(Icons.account_circle),
                title: Text('NFC koppelingen'),
              ),
              ListTile(
                leading: Icon(Icons.settings),
                title: Text('Instellingen'),
              ),
            ],
          ),
        ),
        // floatingActionButton: FloatingActionButton(
        //   backgroundColor: Color(0xFF0779E4),
        //   onPressed: () async {
        //     //
        //   },
        //   tooltip: 'NFC koppelen',
        //   child: const Icon(Icons.nfc),
        // ),
      ),
      viewModelBuilder: () => StartupViewModel(),
    );
  }
}
