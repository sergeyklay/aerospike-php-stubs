<?php

final class Aerospike
{
    // Options can be assigned values that modify default behavior
    const OPT_CONNECT_TIMEOUT     = 1;  // value in milliseconds, default: 1000
    const OPT_READ_TIMEOUT        = 2;  // value in milliseconds, default: 1000
    const OPT_WRITE_TIMEOUT       = 3;  // value in milliseconds, default: 1000
    const OPT_POLICY_RETRY        = 4;  // set to a Aerospike::POLICY_RETRY_* value
    const OPT_POLICY_EXISTS       = 5;  // set to a Aerospike::POLICY_EXISTS_* value
    const OPT_SERIALIZER          = 6;  // set the unsupported type handler
    const OPT_SCAN_PRIORITY       = 7;  // set to a Aerospike::SCAN_PRIORITY_* value
    const OPT_SCAN_PERCENTAGE     = 8;  // integer value 1-100, default: 100
    const OPT_SCAN_CONCURRENTLY   = 9;  // boolean value, default: false
    const OPT_SCAN_NOBINS         = 10; // boolean value, default: false
    const OPT_POLICY_KEY          = 11; // records store the digest unique ID, optionally also its (ns,set,key) inputs
    const OPT_POLICY_GEN          = 12; // set to [Aerospike::POLICY_GEN_* [, $gen_value ]]
    const OPT_POLICY_REPLICA      = 13; // set to one of Aerospike::POLICY_REPLICA_*
    const OPT_POLICY_CONSISTENCY  = 14; // set to one of Aerospike::POLICY_CONSISTENCY_*
    const OPT_POLICY_COMMIT_LEVEL = 15; // set to one of Aerospike::POLICY_COMMIT_LEVEL_*
    const OPT_TTL                 = 16; // record ttl, value in seconds
    const USE_BATCH_DIRECT        = 17; // batch-direct or batch-index protocol. default: 0

    // UDF types
    const UDF_TYPE_LU = 0;

    // Determines a handler for writing values of unsupported type into bins
    // Set OPT_SERIALIZER to one of the following:
    const SERIALIZER_NONE = 0;
    const SERIALIZER_PHP  = 1; // default handler
    const SERIALIZER_JSON = 2;
    const SERIALIZER_USER = 3;

    // Status values returned by scanInfo()
    const SCAN_STATUS_UNDEF      = 0; // Scan status is undefined
    const SCAN_STATUS_INPROGRESS = 1; // Scan is currently running
    const SCAN_STATUS_COMPLETED  = 3; // Scan was aborted due to failure or the user
    const SCAN_STATUS_ABORTED    = 2; // Scan completed successfully

    // Scan priority
    const SCAN_PRIORITY_AUTO   = 0;
    const SCAN_PRORITY_LOW     = 1;
    const SCAN_PRIORITY_MEDIUM = 2;
    const SCAN_PRIORITY_HIGH   = 3;

    // Security role privileges
    const PRIV_USER_ADMIN     = 0;  // user can edit/remove other users
    const PRIV_SYS_ADMIN      = 1;  // can perform sysadmin functions that do not involve user admin
    const PRIV_DATA_ADMIN     = 2;  // can perform data admin functions that do not involve user admin
    const PRIV_READ           = 10; // user can read data only
    const PRIV_READ_WRITE_UDF = 12; // can read and write data through User-Defined Functions

    // The retry policy can be determined by setting OPT_POLICY_RETRY to one of
    const POLICY_RETRY_NONE = 0; // do not retry an operation (default)
    const POLICY_RETRY_ONCE = 1; // allow for a single retry on an operation

    // Replica and consistency guarantee options
    // See: http://www.aerospike.com/docs/client/c/usage/consistency.html
    const POLICY_REPLICA_MASTER      = 0; // read from the partition master replica node (default)
    const POLICY_REPLICA_ANY         = 1; // read from either the master or prole node
    const POLICY_CONSISTENCY_ONE     = 0; // involve a single replica in the read operation (default)
    const POLICY_CONSISTENCY_ALL     = 1; // involve all replicas in the read operation
    const POLICY_COMMIT_LEVEL_ALL    = 0; // return success after committing all replicas (default)
    const POLICY_COMMIT_LEVEL_MASTER = 1; // return success after committing the master replica

    // Roles and privileges
    const PRIV_READ_WRITE = 11; // The ability to read and write data

    // The key policy can be determined by setting OPT_POLICY_KEY to one of
    const POLICY_KEY_DIGEST = 0; // hashes (ns,set,key) data into a unique record ID (default)
    const POLICY_KEY_SEND   = 1; // also send, store, and get the actual (ns,set,key) with each record

    // The generation policy can be set using OPT_POLICY_GEN to one of
    const POLICY_GEN_IGNORE = 0; // write a record, regardless of generation
    const POLICY_GEN_EQ     = 1; // write a record, ONLY if given value is equal to the current record generation
    const POLICY_GEN_GT     = 2; // write a record, ONLY if given value is greater-than the current record generation

    // By default writes will try to create or replace records and bins
    // behaving similar to an array in PHP. Setting
    // OPT_POLICY_EXISTS with one of these values will overwrite this.
    // POLICY_EXISTS_IGNORE (aka CREATE_OR_UPDATE) is the default value
    const POLICY_EXISTS_IGNORE            = 0; // interleave bins of a record if it exists
    const POLICY_EXISTS_CREATE            = 1; // create a record ONLY if it DOES NOT exist
    const POLICY_EXISTS_UPDATE            = 2; // update a record ONLY if it exists
    const POLICY_EXISTS_REPLACE           = 3; // replace a record ONLY if it exists
    const POLICY_EXISTS_CREATE_OR_REPLACE = 4; // overwrite the bins if record exists

    // Query Predicate Operators
    const OP_RANGE    = 'RANGE';
    const OP_EQ       = '=';
    const OP_CONTAINS = 'CONTAINS';
    const OP_BETWEEN  = 'BETWEEN';

    // Multi-operation operators map to the C client
    const OPERATOR_READ    = 1;
    const OPERATOR_WRITE   = 2;
    const OPERATOR_INCR    = 5;
    const OPERATOR_APPEND  = 9;
    const OPERATOR_PREPEND = 10;
    const OPERATOR_TOUCH   = 11;

    // Logger
    const LOG_LEVEL_TRACE = 1;
    const LOG_LEVEL_DEBUG = 2;
    const LOG_LEVEL_INFO  = 3;
    const LOG_LEVEL_WARN  = 4;
    const LOG_LEVEL_ERROR = 5;
    const LOG_LEVEL_OFF   = 6;

    // Server status codes
    const OK                                = 0;    // Success status
    const ERR_SERVER                        = 1;    // Generic server error
    const ERR_RECORD_NOT_FOUND              = 2;
    const ERR_RECORD_GENERATION             = 3;    // Write policy regarding generation violated
    const ERR_REQUEST_INVALID               = 4;    // Invalid request protocol or protocol field
    const ERR_RECORD_EXISTS                 = 5;    // Record already exists
    const ERR_BIN_EXISTS                    = 6;    // Bin already exists
    const ERR_CLUSTER_CHANGE                = 7;    // Cluster state changed during the request
    const ERR_SERVER_FULL                   = 8;    // Node running out of memory/storage
    const ERR_TIMEOUT                       = 9;    // Client or server side timeout error
    const ERR_NO_XDR                        = 10;   // XDR not available for the cluster
    const ERR_CLUSTER                       = 11;   // Generic cluster discovery and connection error
    const ERR_RECORD_TOO_BIG                = 13;   // Record written cannot fit in storage write block
    const ERR_BIN_INCOMPATIBLE_TYPE         = 12;
    const ERR_RECORD_BUSY                   = 14;   // Hot key: too many concurrent requests for the record
    const ERR_SCAN_ABORTED                  = 15;   // Scan aborted by the user
    const ERR_UNSUPPORTED_FEATURE           = 16;
    const ERR_BIN_NOT_FOUND                 = 17;
    const ERR_DEVICE_OVERLOAD               = 18;   // Node storage lagging write load
    const ERR_RECORD_KEY_MISMATCH           = 19;   // Digest incompatibility?
    const ERR_NAMESPACE_NOT_FOUND           = 20;
    const ERR_BIN_NAME                      = 21;   // Name too long or exceeds the unique name quota for the namespace
    const ERR_QUERY_END                     = 50;   // Out of records to query
    const ERR_SECURITY_NOT_SUPPORTED        = 51;
    const ERR_SECURITY_NOT_ENABLED          = 52;
    const ERR_SECURITY_SCHEME_NOT_SUPPORTED = 53;
    const ERR_INVALID_COMMAND               = 54;
    const ERR_INVALID_FIELD                 = 55;
    const ERR_ILLEGAL_STATE                 = 56;
    const ERR_INVALID_USER                  = 60;
    const ERR_USER_ALREADY_EXISTS           = 61;
    const ERR_INVALID_PASSWORD              = 62;
    const ERR_EXPIRED_PASSWORD              = 63;
    const ERR_FORBIDDEN_PASSWORD            = 64;
    const ERR_INVALID_CREDENTIAL            = 65;
    const ERR_INVALID_ROLE                  = 70;
    const ERR_ROLE_ALREADY_EXISTS           = 71;
    const ERR_INVALID_PRIVILEGE             = 72;
    const ERR_NOT_AUTHENTICATED             = 80;
    const ERR_ROLE_VIOLATION                = 81;
    const ERR_UDF                           = 100;  // Generic UDF error
    const ERR_LARGE_ITEM_NOT_FOUND          = 125;
    const ERR_INDEX_FOUND                   = 200;
    const ERR_INDEX_NOT_FOUND               = 201;
    const ERR_INDEX_OOM                     = 202;  // Index out of memory
    const ERR_INDEX_NOT_READABLE            = 203;
    const ERR_INDEX                         = 204;  // Generic secondary index error
    const ERR_INDEX_NAME_MAXLEN             = 205;
    const ERR_INDEX_MAXCOUNT                = 206;  // Max number of indexes reached
    const ERR_QUERY_ABORTED                 = 210;  // Query aborted by the user
    const ERR_QUERY_QUEUE_FULL              = 211;
    const ERR_QUERY_TIMEOUT                 = 212;
    const ERR_QUERY                         = 213;  // Generic query error
    const ERR_UDF_NOT_FOUND                 = 1301; // UDF does not exist
    const ERR_LUA_FILE_NOT_FOUND            = 1302; // Source file for the module not found

    // Client status codes
    const ERR_CLIENT       = -1; // Generic client error
    const ERR_PARAM        = -2; // Invalid client parameter
    const ERR_INVALID_HOST = -4;

    // Index types
    const INDEX_TYPE_DEFAULT   = 0;
    const INDEX_TYPE_LIST      = 1; // index records where the bin contains a list
    const INDEX_TYPE_MAPKEYS   = 2; // index the keys of records whose specified bin is a map
    const INDEX_TYPE_MAPVALUES = 3; // index the values of records whose specified bin is a map

    // Data type
    const INDEX_STRING  = 0; // if the index type is matched, regard values of type string
    const INDEX_NUMERIC = 1; // if the index type is matched, regard values of type integer

    const INDEX_TYPE_STRING  = 0;
    const INDEX_TYPE_INTEGER = 1;

    /**
     * @var int
     */
    private $errorno;

    /**
     * @var string
     */
    private $error;

    /**
     * Constructs a new Aerospike object.
     *
     * <code>
     * $config = ['hosts' => [['addr' => 'localhost', 'port' => 3000]]];
     * $opts = [Aerospike::OPT_CONNECT_TIMEOUT => 1250, Aerospike::OPT_WRITE_TIMEOUT => 1500];
     *
     * $db = new Aerospike($config, true, $opts);
     * </code>
     *
     * @param array $config     An associative array holding the cluster connection information.
     * @param bool  $persistent Whether the C-client will persist between requests. [Optional]
     * @param array $options    Options including
     *                          Aerospike::OPT_CONNECT_TIMEOUT, Aerospike::OPT_READ_TIMEOUT
     *                          Aerospike::OPT_WRITE_TIMEOUT, Aerospike::OPT_SERIALIZER
     *                          Aerospike::OPT_POLICY_KEY, Aerospike::OPT_POLICY_EXISTS
     *                          Aerospike::OPT_POLICY_RETRY, Aerospike::OPT_POLICY_COMMIT_LEVEL
     *                          Aerospike::OPT_POLICY_CONSISTENCY, Aerospike::OPT_POLICY_REPLICA [Optional]
     */
    public function __construct(array $config, $persistent = true, array $options = [])
    {
    }

    /**
     * Destructor for the Aerospike object.
     *
     * Aerospike::__destruct will disconnect from the Aerospike DB cluster and clean up resources.
     *
     * @return void
     */
    public function __destruct()
    {
    }

    /**
     * Tests the connection to the Aerospike DB.
     *
     * <code>
     * $db = new Aerospike($config, true, $opts);
     *
     * if (!$db->isConnected()) {
     *     echo "Aerospike failed to connect[{$db->errorno()}]: {$db->error()}\n";
     *     exit(1);
     * }
     * </code>
     *
     * @return bool
     */
    public function isConnected()
    {
    }

    /**
     * Close all connections to the Aerospike DB.
     *
     * Aerospike::close will disconnect from the Aerospike DB cluster.
     *
     * @return void
     */
    public function close()
    {
    }

    /**
     * Reconnect to the Aerospike DB
     *
     * <code>
     * $db = new Aerospike($config, true, $opts);
     *
     * $db->close();
     * $db->reconnect();
     * </code>
     *
     * @return void
     */
    public function reconnect()
    {
    }

    /**
     * Display an error message associated with the last operation.
     *
     * <code>
     * $db = new Aerospike($config);
     *
     * if (!$db->isConnected()) {
     *     echo "Aerospike failed to connect[{$db->errorno()}]: {$db->error()}\n";
     *     exit(1);
     * }
     * <code>
     *
     * @return string
     */
    public function error()
    {
    }

    /**
     * Display an error code associated with the last operation.
     *
     * <code>
     * $db = new Aerospike($config);
     *
     * if (!$db->isConnected()) {
     *     echo "Aerospike failed to connect[{$db->errorno()}]: {$db->error()}\n";
     *     exit(1);
     * }
     * <code>
     *
     * @return int
     */
    public function errorno()
    {
    }

    /**
     * Sets the logging threshold of the Aerospike object.
     *
     * Declares a logging threshold for the Aerospike C client.
     *
     * <code>
     * one of Aerospike::LOG_LEVEL_\* values
     * </code>
     *
     * @param int $logLevel One of Aerospike::LOG_LEVEL_* values
     *
     * @return void
     */
    public function setLogLevel($logLevel)
    {
    }

    /**
     * Sets a handler for log events.
     *
     * The callback method must follow the signature:
     * <code>
     * public function log_handler (int $level, string $file, string $function, int $line)
     * </code>
     *
     * Example:
     * <code>
     * $db = new Aerospike($config);
     *
     * $db->setLogLevel(Aerospike::LOG_LEVEL_DEBUG);
     * $db->setLogHandler(function ($level, $file, $function, $line) {
     *     switch ($level) {
     *         case Aerospike::LOG_LEVEL_ERROR:
     *             $lvl_str = 'ERROR';
     *             break;
     *         case Aerospike::LOG_LEVEL_WARN:
     *             $lvl_str = 'ERROR';
     *             break;
     *         case Aerospike::LOG_LEVEL_INFO:
     *             $lvl_str = 'ERROR';
     *             break;
     *         case Aerospike::LOG_LEVEL_DEBUG:
     *             $lvl_str = 'ERROR';
     *             break;
     *         case Aerospike::LOG_LEVEL_TRACE:
     *             $lvl_str = 'ERROR';
     *             break;
     *         default:
     *             $lvl_str = '???';
     *     }
     *     error_log("[$lvl_str] in $function at $file:$line");
     * });
     * </code>
     *
     * @param callable $logHandler A callback function invoked for each logging event above the threshold.
     *
     * @return void
     */
    public function setLogHandler($logHandler)
    {
    }

    /**
     * Helper method for building the key array.
     *
     * <code>
     * $db = new Aerospike($config);
     *
     * $key = $db->initKey('test', 'users', 1234);
     *
     * var_dump($key);
     * </code>
     *
     * @param string     $ns       The namespace.
     * @param string     $set      The name of the set within the namespace.
     * @param int|string $pk       The primary key or digest value that identifies the record.
     * @param bool       $isDigest True if the pk argument is a digest, false if it is a key [Optional]
     *
     * @return array
     */
    public function initKey($ns, $set, $pk, $isDigest = false)
    {
    }

    /**
     * Helper method for building the key array.
     *
     * <code>
     * $db = new Aerospike($config);
     *
     * $digest = $db->getKeyDigest('test', 'users', 1);
     * $key = $db->initKey('test', 'users', $digest, true);
     *
     * var_dump($digest, $key);
     * </code>
     *
     * @param string     $ns  The namespace.
     * @param string     $set The name of the set within the namespace.
     * @param int|string $pk  The primary key that identifies the record in the application.
     *
     * @return string
     */
    public function getKeyDigest($ns, $set, $pk)
    {
    }

    /**
     * Writes a record to the Aerospike database.
     *
     * Note: Bin names cannot be longer than 14 characters.
     *       Binary data containing the null byte (\0) may get truncated.
     *
     * <code>
     * $db = new Aerospike($config);
     *
     * $key = $db->initKey('test', 'users', 1234);
     *
     * // will ensure a record exists at the given key with the specified bins
     * $bins = ['email' => 'hey@example.com', 'name' => 'Hey There'];
     * $status = $db->put($key, $bins);
     *
     * // will update the name bin, and create a new 'age' bin
     * $bins = ['name' => 'You There', 'age' => 33];
     * $status = $client->put($key, $bins);
     * </code>
     *
     * @param array $key     The key under which to store the record.
     *                       An array with keys ['ns', 'set', 'key'] or ['ns', 'set', 'digest'].
     * @param array $bins    The array of bin names and values to write.
     * @param int   $ttl     The time-to-live in seconds for the record. [Optional]
     * @param array $options Options including:
     *                       Aerospike::OPT_SERIALIZER, Aerospike::OPT_POLICY_RETRY,
     *                       Aerospike::OPT_READ_TIMEOUT, Aerospike::OPT_POLICY_KEY,
     *                       Aerospike::OPT_POLICY_GEN, Aerospike::OPT_POLICY_EXISTS,
     *                       Aerospike::OPT_POLICY_COMMIT_LEVEL [Optional]
     *
     * @return int
     */
    public function put(array $key, array $bins, $ttl = 0, array $options = [])
    {
    }

    /**
     * Gets a record from the Aerospike database.
     *
     * <code>
     * $db = new Aerospike($config);
     *
     * $key = $db->initKey('test', 'users', 1234);
     * $filter = ['email', 'manager'];
     * $status = $db->get($key, $record, $filter);
     *
     * var_dump($key, $record);
     * </code>
     *
     * @param array $key     The key under which the record can be found.
     *                       An array with keys ['ns', 'set', 'key'] or ['ns', 'set', 'digest'].
     * @param array $record  An array of key, metadata, and bins.
     * @param array $select  An array of bin names which are the subset to be returned. [Optional]
     * @param array $options Options including:
     *                       Aerospike::OPT_READ_TIMEOUT, Aerospike::OPT_POLICY_KEY,
     *                       Aerospike::OPT_POLICY_CONSISTENCY, Aerospike::OPT_POLICY_REPLICA [Optional]
     *
     * @return int
     */
    public function get(array $key, array &$record, array $select = [], array $options = [])
    {
    }

    /**
     * Check if a record exists in the Aerospike database
     *
     * <code>
     * $db = new Aerospike($config, true, $opts);
     * $key = $db->initKey('test', 'users', 1234);
     * $status = $db->exists($key, $metadata);
     *
     * var_dump($status, $metadata);
     * </code>
     *
     * @param array $key      The key under which the record can be found.
     *                        An array with keys ['ns','set','key'] or ['ns','set','digest'].
     * @param array $metadata Filled by an array of metadata.
     * @param array $options  Options including:
     *                        Aerospike::OPT_READ_TIMEOUT, Aerospike::OPT_POLICY_KEY
     *                        Aerospike::OPT_POLICY_CONSISTENCY, Aerospike::OPT_POLICY_REPLICA [Optional]
     * @return int
     */
    public function exists(array $key, array &$metadata, array $options = [])
    {
    }

    /**
     * Touch a record in the Aerospike DB.
     *
     * Will touch the given record, resetting its time-to-live and incrementing its generation.
     *
     * <code>
     * $db = new Aerospike($config);
     * $key = $db->initKey('test', 'users', 1234);
     *
     * // Added 120 seconds to the record's expiration.
     * $status = $db->touch($key, 120);
     *
     * var_dump($status);
     * </code>
     *
     * @param array $key     The key for the record. An array with keys ['ns','set','key'] or ['ns','set','digest'].
     * @param int   $ttl     The time-to-live in seconds for the record. [Optional]
     * @param array $options Options including:
     *                       Aerospike::OPT_WRITE_TIMEOUT, Aerospike::OPT_POLICY_RETRY
     *                       Aerospike::OPT_POLICY_KEY, Aerospike::OPT_POLICY_GEN,
     *                       Aerospike::OPT_POLICY_REPLICA, Aerospike::OPT_POLICY_CONSISTENCY,
     *                       Aerospike::OPT_POLICY_COMMIT_LEVEL [Optional]
     *
     * @return int
     */
    public function touch(array $key, $ttl = 0, array $options = [])
    {
    }

    /**
     * Removes a record from the Aerospike database.
     *
     * <code>
     * $db = new Aerospike($config);
     * $key = $db->initKey('test', 'users', 1234);
     *
     * $status = $db->remove($key, [Aerospike::OPT_POLICY_RETRY => Aerospike::POLICY_RETRY_NONE]);
     *
     * var_dump($status);
     * </code>
     *
     * @param array $key     The key for the record. An array with keys ['ns','set','key'] or ['ns','set','digest'].
     * @param array $options Options including:
     *                       Aerospike::OPT_WRITE_TIMEOUT, Aerospike::OPT_POLICY_RETRY
     *                       Aerospike::OPT_POLICY_KEY, Aerospike::OPT_POLICY_GEN,
     *                       Aerospike::OPT_POLICY_COMMIT_LEVEL [Optional]
     *
     * @return int
     */
    public function remove(array $key, array $options = [])
    {
    }

    /**
     * @param array $key
     * @param array $bins
     * @param array $options
     *
     * @return int
     */
    public function removeBin(array $key, array $bins, array $options = [])
    {
    }

    /**
     * Increments a numeric value in a bin.
     *
     * <code>
     * $db = new Aerospike($config);
     *
     * $key = $db->initKey('test', 'users', 1234);
     * $options = [Aerospike::OPT_TTL => 7200];
     *
     * $status = $db->increment($key, 'pto', -4, $options);
     *
     * var_dump($status);
     * </code>
     *
     * @param array  $key     The key under which the record can be found.
     *                        An array with keys ['ns','set','key'] or ['ns','set','digest'].
     * @param string $bin     The name of the bin in which we have a numeric value.
     * @param int    $offset  The integer by which to increment the value in the bin.
     * @param array  $options Options including:
     *                        Aerospike::OPT_WRITE_TIMEOUT, Aerospike::OPT_TTL
     *                        Aerospike::OPT_POLICY_RETRY, Aerospike::OPT_POLICY_KEY,
     *                        Aerospike::OPT_POLICY_GEN, Aerospike::OPT_POLICY_REPLICA,
     *                        Aerospike::OPT_POLICY_CONSISTENCY, Aerospike::OPT_POLICY_COMMIT_LEVEL [Optional]
     *
     * @return int
     */
    public function increment(array $key, $bin, $offset, array $options = [])
    {
    }

    /**
     * @param array  $key
     * @param string $bin
     * @param string $value
     * @param array  $options
     *
     * @return int
     */
    public function append(array $key, $bin, $value, array $options = [])
    {
    }

    /**
     * @param array  $key
     * @param string $bin
     * @param string $value
     * @param array  $options
     *
     * @return int
     */
    public function prepend(array $key, $bin, $value, array $options = [])
    {
    }

    /**
     * @param array $key
     * @param array $operations
     * @param array $returned
     *
     * @return int
     */
    public function operate(array $key, array $operations, array &$returned = [])
    {
    }

    /**
     * @param callable $callable
     *
     * @return void
     */
    public static function setSerializer($callable)
    {
    }

    /**
     * @param callable $callable
     *
     * @return void
     */
    public static function setDeserializer($callable)
    {
    }

    /**
     * @param array $keys
     * @param array $records
     * @param array $filter
     * @param array $options
     *
     * @return int
     */
    public function getMany(array $keys, array &$records, array $filter = [], array $options = [])
    {
    }

    /**
     * @param array $keys
     * @param array $metadata
     * @param array $options
     *
     * @return int
     */
    public function existsMany(array $keys, array &$metadata, array $options = [])
    {
    }

    /**
     * @param string $path
     * @param string $module
     * @param int    $language
     *
     * @return int
     */
    public function register($path, $module, $language = Aerospike::UDF_TYPE_LUA)
    {
    }

    /**
     * @param string $module
     *
     * @return int
     */
    public function deregister($module)
    {
    }

    /**
     * @param array $modules
     * @param int   $language
     *
     * @return int
     */
    public function listRegistered(array &$modules, $language)
    {
    }

    /**
     * @param string $module
     * @param string $code
     *
     * @return int
     */
    public function getRegistered($module, &$code)
    {
    }

    /**
     * @param array  $key
     * @param string $module
     * @param string $function
     * @param array  $args
     * @param mixed  $returned
     * @param array  $options
     *
     * @return int
     */
    public function apply(array $key, $module, $function, array $args = [], &$returned = null, array $options = [])
    {
    }

    /**
     * @param string $ns
     * @param string $set
     * @param array  $where
     * @param string $module
     * @param string $function
     * @param array  $args
     * @param mixed  $returned
     * @param array  $options
     *
     * @return int
     */
    public function aggregate($ns, $set, array $where, $module, $function, array $args, &$returned = null, array $options = [])
    {
    }

    /**
     * @param string $ns
     * @param string $set
     * @param string $module
     * @param string $function
     * @param array  $args
     * @param int    $scan_id
     * @param array  $options
     *
     * @return int
     */
    public function scanApply($ns, $set, $module, $function, array $args, &$scan_id, array $options = [])
    {
    }

    /**
     * @param int   $scan_id
     * @param array $info
     * @param array $options
     *
     * @return int
     */
    public function scanInfo($scan_id, array &$info, array $options = [])
    {
    }

    /**
     * @param string   $ns
     * @param string   $set
     * @param array    $where
     * @param callable $record
     * @param array    $select
     * @param array    $options
     *
     * @return int
     */
    public function query($ns, $set, array $where, $record, array $select = [], array $options = [])
    {
    }

    /**
     * Scans a set in the Aerospike database.
     *
     * <code>
     * $db = new Aerospike($config);
     * $options = [Aerospike::OPT_SCAN_PRIORITY => Aerospike::SCAN_PRIORITY_MEDIUM];
     * $processed = 0;
     *
     * $status = $db->scan('test', 'users', function ($record) use (&$processed) {
     *     if (!is_null($record['bins']['email'])) echo $record['bins']['email']."\n";
     *     if ($processed++ > 19) return false; // halt the stream by returning a false
     * }, ['email'], $options);
     *
     * var_dump($status, $processed);
     * </code>
     *
     * @param string   $ns The namespace
     * @param string   $set The set to be scanned
     * @param callable $recordCallback A callback function invoked for each record streaming back from the server
     * @param array    $select An array of bin names which are the subset to be returned
     * @param array    $options Options including:
     *                          Aerospike::OPT_READ_TIMEOUT
     *                          Aerospike::OPT_SCAN_PRIORITY
     *                          Aerospike::OPT_SCAN_PERCENTAGE - of the records in the set to return
     *                          Aerospike::OPT_SCAN_CONCURRENTLY - whether to run the scan in parallel
     *                          Aerospike::OPT_SCAN_NOBINS whether to not retrieve bins for the records
     *
     * @return int
     */
    public function scan($ns, $set, $recordCallback, array $select = [], array $options = [])
    {
    }

    /**
     * @param string     $bin
     * @param int|string $val
     *
     * @return array
     */
    public static function predicateEquals($bin, $val)
    {
    }

    /**
     * @param string $bin
     * @param int    $min
     * @param int    $max
     *
     * @return array
     */
    public static function predicateBetween($bin, $min, $max)
    {
    }

    /**
     * @param string     $bin
     * @param int        $indexType
     * @param int|string $val
     *
     * @return array
     */
    public static function predicateContains($bin, $indexType, $val)
    {
    }

    /**
     * @param string $bin
     * @param int    $indexType
     * @param int    $min
     * @param int    $max
     *
     * @return array
     */
    public static function predicateRange($bin, $indexType, $min, $max)
    {
    }

    /**
     * @param string $ns
     * @param string $set
     * @param string $bin
     * @param string $name
     * @param int    $indexType
     * @param int    $dataType
     * @param array  $options
     *
     * @return int
     */
    public function addIndex($ns, $set, $bin, $name, $indexType, $dataType, array $options = [])
    {
    }

    /**
     * @param string $ns
     * @param string $name
     * @param array  $options
     *
     * @return int
     */
    public function dropIndex($ns, $name, array $options = [])
    {
    }

    /**
     * Send an info request to a single cluster node
     *
     * <code>
     * $db = new Aerospike($config, true, $opts);
     * $status = $db->info('bins/test', $response);
     *
     * var_dump($status, $response);
     * </code>
     *
     * @param string $request  A formatted string representing a command and control operation.
     * @param string $response A formatted response from the server.
     * @param array  $host     An array holding the cluster node connection information cluster
     *                         and manage its connections to them. [Optional]
     * @param array  $options  Options including Aerospike::OPT_READ_TIMEOUT [Optional]
     *
     * @return int
     */
    public function info($request, &$response, array $host = [], array $options = [])
    {
    }

    /**
     * @param string $request
     * @param array  $config
     * @param array  $options
     *
     * @return array
     */
    public function infoMany($request, array $config = [], array $options = [])
    {
    }

    /**
     * Get the addresses of the cluster nodes
     *
     * <code>
     * $db = new Aerospike($config, true, $opts);
     * $nodes = $db->getNodes();
     *
     * var_dump($nodes);
     * </code>
     *
     * @return array|null
     */
    public function getNodes()
    {
    }

    /**
     * @param string $role
     * @param array  $privileges
     * @param array  $options
     *
     * @return int
     */
    public function createRole($role, array $privileges, array $options = [])
    {
    }

    /**
     * @param string $role
     * @param array  $privileges
     * @param array  $options
     *
     * @return int
     */
    public function grantPrivileges($role, array $privileges, array $options = [])
    {
    }

    /**
     * @param string $role
     * @param array  $privileges
     * @param array  $options
     *
     * @return int
     */
    public function revokePrivileges($role, array $privileges, array $options = [])
    {
    }

    /**
     * @param string $role
     * @param array  $privileges
     * @param array  $options
     *
     * @return int
     */
    public function queryRole($role, array &$privileges, array $options = [])
    {
    }

    /**
     * @param array $roles
     * @param array $options
     *
     * @return int
     */
    public function queryRoles(array &$roles, array $options = [])
    {
    }

    /**
     * @param string $role
     * @param array  $options
     *
     * @return int
     */
    public function dropRole($role, array $options = [])
    {
    }

    /**
     * @param string $user
     * @param string $password
     * @param array  $roles
     * @param array  $options
     *
     * @return int
     */
    public function createUser($user, $password, array $roles, array $options = [])
    {
    }

    /**
     * @param string $user
     * @param string $password
     * @param array $options
     *
     * @return int
     */
    public function setPassword($user, $password, array $options = [])
    {
    }

    /**
     * @param string $user
     * @param string $password
     * @param array  $options
     *
     * @return int
     */
    public function changePassword($user, $password, array $options = [])
    {
    }

    /**
     * @param string $user
     * @param array  $roles
     * @param array  $options
     *
     * @return int
     */
    public function grantRoles($user, array $roles, array $options = [])
    {
    }

    /**
     * @param string $user
     * @param array  $roles
     * @param array  $options
     *
     * @return int
     */
    public function revokeRoles($user, array $roles, array $options = [])
    {
    }

    /**
     * @param string $user
     * @param array  $roles
     * @param array  $options
     *
     * @return int
     */
    public function queryUser($user, array &$roles, array $options = [])
    {
    }

    /**
     * @param array $roles
     * @param array $options
     *
     * @return int
     */
    public function queryUsers(array &$roles, array $options = [])
    {
    }

    /**
     * @param string $user
     * @param array  $options
     *
     * @return int
     */
    public function dropUser($user, array $options = [])
    {
    }

    public function getHeader()
    {
    }

    /**
     * @param array $key
     * @param array $metadata
     * @param array $options
     *
     * @return int
     */
    public function getMetadata(array $key, array &$metadata, array $options = [])
    {
    }

    /**
     * @param string $ns
     * @param string $set
     * @param string $bin
     * @param int    $type
     * @param string $name
     *
     * @deprecated
     *
     * @return int
     */
    public function createIndex($ns, $set, $bin, $type, $name)
    {
    }
}
