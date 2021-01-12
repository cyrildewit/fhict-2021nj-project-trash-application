import 'package:auto_route/auto_route_annotations.dart';
import 'package:project_trash/app/route_guards/auth_guard.dart';
import 'package:project_trash/ui/views/settings/settings_view.dart';
import 'package:project_trash/ui/views/statistics/statistics_view.dart';
import 'package:project_trash/ui/views/nfc_links/nfc_links_view.dart';
import 'package:project_trash/ui/views/startup/startup_view.dart';
import 'package:project_trash/ui/views/home/home_view.dart';
import 'package:project_trash/ui/views/login/login_view.dart';
import 'package:project_trash/ui/views/nfc_linking/nfc_linking_view.dart';
import 'package:project_trash/ui/views/trashed_product/trashed_product_view.dart';

@MaterialAutoRouter(
  routes: [
    MaterialRoute(page: StartupView, initial: true, guards: [AuthGuard]),
    MaterialRoute(page: HomeView, guards: [AuthGuard]),
    MaterialRoute(page: StatisticsView, guards: [AuthGuard]),
    MaterialRoute(page: NfcLinksView, guards: [AuthGuard]),
    MaterialRoute(page: SettingsView, guards: [AuthGuard]),
    MaterialRoute(page: LoginView, guards: [AuthGuard]),
    MaterialRoute(page: NfcLinkingView, guards: [AuthGuard]),
    MaterialRoute(page: TrashedProductView, guards: [AuthGuard]),
    // MaterialRoute(path: "*", page: UnknownRouteScreen)
  ],
)
class $Router {}
