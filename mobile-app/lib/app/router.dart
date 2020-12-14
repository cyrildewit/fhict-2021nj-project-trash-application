import 'package:auto_route/auto_route_annotations.dart';
import 'package:project_trash/ui/views/settings/settings_view.dart';
import 'package:project_trash/ui/views/statistics/statistics_view.dart';
import 'package:project_trash/ui/views/nfc_links/nfc_links_view.dart';
import 'package:project_trash/ui/views/startup/startup_view.dart';
import 'package:project_trash/ui/views/home/home_view.dart';

@MaterialAutoRouter(
  routes: [
    MaterialRoute(page: StartupView, initial: true),
    MaterialRoute(page: HomeView),
    MaterialRoute(page: StatisticsView),
    MaterialRoute(page: NfcLinksView),
    MaterialRoute(page: SettingsView),
  ],
)
class $Router {}
