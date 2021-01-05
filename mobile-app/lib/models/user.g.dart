// GENERATED CODE - DO NOT MODIFY BY HAND

part of 'user.dart';

// **************************************************************************
// JsonSerializableGenerator
// **************************************************************************

User _$UserFromJson(Map<String, dynamic> json) {
  return User(
    uuid: json['uuid'] as String,
    name: json['name'] as String,
    email: json['email'] as String,
    avatarTinyUrl: json['avatar_tiny_url'] as String,
    balance: json['balance'] as int,
    updatedAt: json['updated_at'] as String,
    createdAt: json['created_at'] as String,
  );
}

Map<String, dynamic> _$UserToJson(User instance) => <String, dynamic>{
      'uuid': instance.uuid,
      'name': instance.name,
      'email': instance.email,
      'avatar_tiny_url': instance.avatarTinyUrl,
      'balance': instance.balance,
      'updated_at': instance.updatedAt,
      'created_at': instance.createdAt,
    };
