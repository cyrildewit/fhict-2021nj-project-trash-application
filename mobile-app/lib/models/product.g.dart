// GENERATED CODE - DO NOT MODIFY BY HAND

part of 'product.dart';

// **************************************************************************
// JsonSerializableGenerator
// **************************************************************************

Product _$ProductFromJson(Map<String, dynamic> json) {
  return Product(
    uid: json['uid'] as String,
    barcode: json['barcode'] as String,
    name: json['name'] as String,
    information: json['information'] as String,
    updatedAt: json['updated_at'] as String,
    createdAt: json['created_at'] as String,
  )
    ..id = json['id'] as int
    ..depositAmount = json['deposit_amount'] as int;
}

Map<String, dynamic> _$ProductToJson(Product instance) => <String, dynamic>{
      'id': instance.id,
      'uid': instance.uid,
      'barcode': instance.barcode,
      'name': instance.name,
      'information': instance.information,
      'deposit_amount': instance.depositAmount,
      'updated_at': instance.updatedAt,
      'created_at': instance.createdAt,
    };
