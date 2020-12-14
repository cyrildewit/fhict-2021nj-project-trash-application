// GENERATED CODE - DO NOT MODIFY BY HAND

// **************************************************************************
// InjectableConfigGenerator
// **************************************************************************

import 'package:get_it/get_it.dart';
import 'package:injectable/injectable.dart';
import 'package:stacked_services/stacked_services.dart';

import '../ui/views/account/account_viewmodel.dart';
import '../ui/views/home/home_viewmodel.dart';
import '../ui/views/nfc_links/nfc_links_viewmodel.dart';
import '../services/product_api_client.dart';
import '../services/product_service.dart';
import '../ui/views/statistics/statistics_viewmodel.dart';
import '../services/third_party_services_module.dart';

/// adds generated dependencies
/// to the provided [GetIt] instance

GetIt $initGetIt(
  GetIt get, {
  String environment,
  EnvironmentFilter environmentFilter,
}) {
  final gh = GetItHelper(get, environment, environmentFilter);
  final thirdPartyServicesModule = _$ThirdPartyServicesModule();
  gh.lazySingleton<NavigationService>(
      () => thirdPartyServicesModule.navigationService);
  gh.lazySingleton<ProductApiClient>(() => ProductApiClient());
  gh.lazySingleton<ProductService>(() => ProductService());

  // Eager singletons must be registered in the right order
  gh.singleton<AccountViewModel>(AccountViewModel());
  gh.singleton<HomeViewModel>(HomeViewModel());
  gh.singleton<NfcLinksViewModel>(NfcLinksViewModel());
  gh.singleton<StatisticsViewModel>(StatisticsViewModel());
  return get;
}

class _$ThirdPartyServicesModule extends ThirdPartyServicesModule {
  @override
  NavigationService get navigationService => NavigationService();
}
