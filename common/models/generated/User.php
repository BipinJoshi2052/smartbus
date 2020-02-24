<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property int $incorrect_login
 * @property string $name
 * @property int $role
 * @property string $image
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $email_verified
 * @property string $email_verification
 * @property int $status
 * @property string $phone
 * @property int $phone_is_validated
 * @property int $verification_id
 * @property int $is_verified
 * @property string $created_on
 * @property string $updated_on
 * @property int $created_by
 * @property int $updated_by
 *
 * @property AcLedgerEntry[] $acLedgerEntries
 * @property AcLedgerType[] $acLedgerTypes
 * @property AcLedgerType[] $acLedgerTypes0
 * @property AcLedgers[] $acLedgers
 * @property AcLedgers[] $acLedgers0
 * @property AcTaxes[] $acTaxes
 * @property AcTaxes[] $acTaxes0
 * @property Amenities[] $amenities
 * @property Amenities[] $amenities0
 * @property Auth[] $auths
 * @property Blog[] $blogs
 * @property Blog[] $blogs0
 * @property BlogCategories[] $blogCategories
 * @property BlogCategories[] $blogCategories0
 * @property BlogComments[] $blogComments
 * @property Bookings[] $bookings
 * @property Bookings[] $bookings0
 * @property ClientPageContents[] $clientPageContents
 * @property Clients[] $clients
 * @property Clients[] $clients0
 * @property Locations[] $locations
 * @property Locations[] $locations0
 * @property News[] $news
 * @property News[] $news0
 * @property Permissions[] $permissions
 * @property Permissions[] $permissions0
 * @property ScheduleDepartures[] $scheduleDepartures
 * @property ScheduleDepartures[] $scheduleDepartures0
 * @property Schedules[] $schedules
 * @property Schedules[] $schedules0
 * @property Schedules[] $schedules1
 * @property Schedules[] $schedules2
 * @property VerificationUsers $verification
 * @property User $createdBy
 * @property User[] $users
 * @property User $updatedBy
 * @property User[] $users0
 * @property UserRoles $role0
 * @property UserDetails $userDetails
 * @property VehicleComments[] $vehicleComments
 * @property VehicleComments[] $vehicleComments0
 * @property VehicleRatings[] $vehicleRatings
 * @property VehicleRatings[] $vehicleRatings0
 * @property VehicleTypes[] $vehicleTypes
 * @property VehicleTypes[] $vehicleTypes0
 * @property Vehicles[] $vehicles
 * @property Vehicles[] $vehicles0
 * @property Vehicles[] $vehicles1
 * @property VendorComments[] $vendorComments
 * @property VendorComments[] $vendorComments0
 * @property VerificationActions[] $verificationActions
 * @property VerificationActions[] $verificationActions0
 * @property VerificationComments[] $verificationComments
 * @property VerificationComments[] $verificationComments0
 * @property VerificationUsers[] $verificationUsers
 * @property VerificationUsers[] $verificationUsers0
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['incorrect_login', 'name', 'username', 'auth_key', 'password_hash', 'email'], 'required'],
            [['incorrect_login', 'role', 'email_verified', 'status', 'phone_is_validated', 'verification_id', 'is_verified', 'created_by', 'updated_by'], 'integer'],
            [['image'], 'string'],
            [['created_on', 'updated_on'], 'safe'],
            [['name'], 'string', 'max' => 150],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['email_verification', 'phone'], 'string', 'max' => 64],
            [['username'], 'unique'],
            [['auth_key'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['verification_id'], 'exist', 'skipOnError' => true, 'targetClass' => VerificationUsers::className(), 'targetAttribute' => ['verification_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['role'], 'exist', 'skipOnError' => true, 'targetClass' => UserRoles::className(), 'targetAttribute' => ['role' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'incorrect_login' => 'Incorrect Login',
            'name' => 'Name',
            'role' => 'Role',
            'image' => 'Image',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'email_verified' => 'Email Verified',
            'email_verification' => 'Email Verification',
            'status' => 'Status',
            'phone' => 'Phone',
            'phone_is_validated' => 'Phone Is Validated',
            'verification_id' => 'Verification ID',
            'is_verified' => 'Is Verified',
            'created_on' => 'Created On',
            'updated_on' => 'Updated On',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcLedgerEntries()
    {
        return $this->hasMany(AcLedgerEntry::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcLedgerTypes()
    {
        return $this->hasMany(AcLedgerType::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcLedgerTypes0()
    {
        return $this->hasMany(AcLedgerType::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcLedgers()
    {
        return $this->hasMany(AcLedgers::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcLedgers0()
    {
        return $this->hasMany(AcLedgers::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcTaxes()
    {
        return $this->hasMany(AcTaxes::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcTaxes0()
    {
        return $this->hasMany(AcTaxes::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAmenities()
    {
        return $this->hasMany(Amenities::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAmenities0()
    {
        return $this->hasMany(Amenities::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuths()
    {
        return $this->hasMany(Auth::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogs()
    {
        return $this->hasMany(Blog::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogs0()
    {
        return $this->hasMany(Blog::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogCategories()
    {
        return $this->hasMany(BlogCategories::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogCategories0()
    {
        return $this->hasMany(BlogCategories::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogComments()
    {
        return $this->hasMany(BlogComments::className(), ['customer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Bookings::className(), ['booker_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookings0()
    {
        return $this->hasMany(Bookings::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientPageContents()
    {
        return $this->hasMany(ClientPageContents::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClients()
    {
        return $this->hasMany(Clients::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClients0()
    {
        return $this->hasMany(Clients::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocations()
    {
        return $this->hasMany(Locations::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocations0()
    {
        return $this->hasMany(Locations::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews0()
    {
        return $this->hasMany(News::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermissions()
    {
        return $this->hasMany(Permissions::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermissions0()
    {
        return $this->hasMany(Permissions::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScheduleDepartures()
    {
        return $this->hasMany(ScheduleDepartures::className(), ['problem_reported_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScheduleDepartures0()
    {
        return $this->hasMany(ScheduleDepartures::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedules::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules0()
    {
        return $this->hasMany(Schedules::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules1()
    {
        return $this->hasMany(Schedules::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules2()
    {
        return $this->hasMany(Schedules::className(), ['operator_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVerification()
    {
        return $this->hasOne(VerificationUsers::className(), ['id' => 'verification_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers0()
    {
        return $this->hasMany(User::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole0()
    {
        return $this->hasOne(UserRoles::className(), ['id' => 'role']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserDetails()
    {
        return $this->hasOne(UserDetails::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleComments()
    {
        return $this->hasMany(VehicleComments::className(), ['vendor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleComments0()
    {
        return $this->hasMany(VehicleComments::className(), ['customer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleRatings()
    {
        return $this->hasMany(VehicleRatings::className(), ['customer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleRatings0()
    {
        return $this->hasMany(VehicleRatings::className(), ['vendor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleTypes()
    {
        return $this->hasMany(VehicleTypes::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleTypes0()
    {
        return $this->hasMany(VehicleTypes::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicles()
    {
        return $this->hasMany(Vehicles::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicles0()
    {
        return $this->hasMany(Vehicles::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicles1()
    {
        return $this->hasMany(Vehicles::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendorComments()
    {
        return $this->hasMany(VendorComments::className(), ['vendor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendorComments0()
    {
        return $this->hasMany(VendorComments::className(), ['customer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVerificationActions()
    {
        return $this->hasMany(VerificationActions::className(), ['verified_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVerificationActions0()
    {
        return $this->hasMany(VerificationActions::className(), ['requested_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVerificationComments()
    {
        return $this->hasMany(VerificationComments::className(), ['requested_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVerificationComments0()
    {
        return $this->hasMany(VerificationComments::className(), ['verified_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVerificationUsers()
    {
        return $this->hasMany(VerificationUsers::className(), ['verified_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVerificationUsers0()
    {
        return $this->hasMany(VerificationUsers::className(), ['requested_by' => 'id']);
    }
}
