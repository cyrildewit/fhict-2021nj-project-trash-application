// GENERATED CODE - DO NOT MODIFY BY HAND

part of 'product.dart';

// **************************************************************************
// JsonSerializableGenerator
// **************************************************************************

Product _$ProductFromJson(Map<String, dynamic> json) {
  return Product(
    id: json['id'] as int,
    barcode: json['barcode'] as String,
    description: json['description'] as String,
    thumbnailTinyUrl: json['thumbnail_tiny_url'] as String,
    thumbnailSmallUrl: json['thumbnail_small_url'] as String,
    thumbnailMediumUrl: json['thumbnail_medium_url'] as String,
    thumbnailLargeUrl: json['thumbnail_large_url'] as String,
    updatedAt: json['updated_at'] as String,
    createdAt: json['created_at'] as String,
  )..originLocale = json['origin_locale'] as String;
}

Map<String, dynamic> _$ProductToJson(Product instance) => <String, dynamic>{
      'id': instance.id,
      'barcode': instance.barcode,
      'description': instance.description,
      'origin_locale': instance.originLocale,
      'thumbnail_tiny_url': instance.thumbnailTinyUrl,
      'thumbnail_small_url': instance.thumbnailSmallUrl,
      'thumbnail_medium_url': instance.thumbnailMediumUrl,
      'thumbnail_large_url': instance.thumbnailLargeUrl,
      'updated_at': instance.updatedAt,
      'created_at': instance.createdAt,
    };
