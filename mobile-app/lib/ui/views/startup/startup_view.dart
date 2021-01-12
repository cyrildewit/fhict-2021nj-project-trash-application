import 'package:flutter/material.dart';
import 'package:project_trash/ui/views/login/login_view.dart';
import 'package:project_trash/ui/views/register/register_view.dart';
import 'package:stacked/stacked.dart';

import 'package:project_trash/ui/views/startup/startup_viewmodel.dart';
import 'package:project_trash/ui/views/home/home_view.dart';
import 'package:project_trash/ui/views/statistics/statistics_view.dart';
import 'package:project_trash/ui/views/nfc_links/nfc_links_view.dart';
import 'package:project_trash/ui/views/settings/settings_view.dart';

class StartupView extends StatelessWidget {
  const StartupView({Key key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return ViewModelBuilder<StartupViewModel>.reactive(
      // onModelReady: (model) async => model.initialise(),
      disposeViewModel: false,
      initialiseSpecialViewModelsOnce: true,
      viewModelBuilder: () => StartupViewModel(),
      builder: (context, model, child) => Scaffold(
        appBar: AppBar(
          title: Text('Project TRASH'),
          actions: [
            IconButton(
              icon: const Icon(Icons.refresh),
              tooltip: 'Fetch page data',
              onPressed: () async {
                await model.initialise();
              },
            ),
          ],
        ),
        drawer: Drawer(
          child: ListView(
            padding: EdgeInsets.zero,
            children: <Widget>[
              UserAccountsDrawerHeader(
                currentAccountPicture: CircleAvatar(
                  backgroundImage:
                      NetworkImage(model.user?.avatarTinyUrl ?? ''),
                ),
                accountName: new Text(model.user?.name ?? ''),
                accountEmail: new Text(model.user?.email ?? ''),
              ),
              ListTile(
                leading: Icon(Icons.home),
                title: Text('Home'),
                onTap: () => model.navigateToIndex(0, context),
              ),
              // ListTile(
              //   leading: Icon(Icons.bar_chart),
              //   title: Text('Statistieken'),
              //   onTap: () => model.navigateToIndex(1, context),
              // ),
              // ListTile(
              //   leading: Icon(Icons.nfc),
              //   title: Text('NFC koppelingen'),
              //   onTap: () => model.navigateToIndex(2, context),
              // ),
              // ListTile(
              //   leading: Icon(Icons.settings),
              //   title: Text('Instellingen'),
              //   onTap: () => model.navigateToIndex(3, context),
              // ),
              ListTile(
                leading: Icon(Icons.supervised_user_circle),
                title: Text('Inloggen'),
                onTap: () => model.navigateToIndex(4, context),
              ),
              ListTile(
                leading: Icon(Icons.app_registration),
                title: Text('Registreren'),
                onTap: () => model.navigateToIndex(5, context),
              ),
            ],
          ),
        ),
        body: getViewForIndex(model.currentIndex, model),
        // floatingActionButton: FloatingActionButton(
        //   backgroundColor: Color(0xFF0779E4),
        //   onPressed: () async {
        //     //
        //   },
        //   tooltip: 'NFC koppelen',
        //   child: const Icon(Icons.nfc),
        // ),
      ),
    );
  }

  Widget getViewForIndex(int index, model) {
    switch (index) {
      case 0:
        return HomeView();
      case 1:
        return StatisticsView();
      case 2:
        return NfcLinksView();
      case 3:
        return SettingsView();
      case 4:
        return LoginView();
      case 5:
        return RegisterView();
      default:
        return HomeView();
    }
  }
}
