// GENERATED CODE - DO NOT MODIFY BY HAND

// **************************************************************************
// InjectableConfigGenerator
// **************************************************************************

import 'package:get_it/get_it.dart';
import 'package:injectable/injectable.dart';
import 'package:stacked_services/stacked_services.dart';

import '../services/authentication_api_client.dart';
import '../services/authentication_service.dart';
import '../ui/views/home/home_viewmodel.dart';
import '../ui/views/login/login_viewmodel.dart';
import '../ui/views/nfc_links/nfc_links_viewmodel.dart';
import '../services/product_api_client.dart';
import '../services/product_service.dart';
import '../ui/views/register/register_viewmodel.dart';
import '../ui/views/settings/settings_viewmodel.dart';
import '../ui/views/statistics/statistics_viewmodel.dart';
import '../services/third_party_services_module.dart';
import '../services/user_api_client.dart';
import '../services/user_service.dart';

/// adds generated dependencies
/// to the provided [GetIt] instance

GetIt $initGetIt(
  GetIt get, {
  String environment,
  EnvironmentFilter environmentFilter,
}) {
  final gh = GetItHelper(get, environment, environmentFilter);
  final thirdPartyServicesModule = _$ThirdPartyServicesModule();
  gh.lazySingleton<AuthenticationApiClient>(() => AuthenticationApiClient());
  gh.lazySingleton<AuthenticationService>(() => AuthenticationService());
  gh.lazySingleton<NavigationService>(
      () => thirdPartyServicesModule.navigationService);
  gh.lazySingleton<ProductApiClient>(() => ProductApiClient());
  gh.lazySingleton<ProductService>(() => ProductService());
  gh.lazySingleton<UserApiClient>(() => UserApiClient());
  gh.lazySingleton<UserService>(() => UserService());

  // Eager singletons must be registered in the right order
  gh.singleton<HomeViewModel>(HomeViewModel());
  gh.singleton<LoginViewModel>(LoginViewModel());
  gh.singleton<NfcLinksViewModel>(NfcLinksViewModel());
  gh.singleton<RegisterViewModel>(RegisterViewModel());
  gh.singleton<SettingsViewModel>(SettingsViewModel());
  gh.singleton<StatisticsViewModel>(StatisticsViewModel());
  return get;
}

class _$ThirdPartyServicesModule extends ThirdPartyServicesModule {
  @override
  NavigationService get navigationService => NavigationService();
}
