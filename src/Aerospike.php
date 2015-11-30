<?php

final class Aerospike
{
    const USE_BATCH_DIRECT = 17;
    const UDF_TYPE_LUA = 0;
    const SERIALIZER_USER = 3;
    const SERIALIZER_PHP = 1;
    const SERIALIZER_NONE = 0;
    const SERIALIZER_JSON = 2;
    const SCAN_STATUS_UNDEF = 0;
    const SCAN_STATUS_INPROGRESS = 1;
    const SCAN_STATUS_COMPLETED = 3;
    const SCAN_STATUS_ABORTED = 2;
    const SCAN_PRORITY_LOW = 1;
    const SCAN_PRIORITY_MEDIUM = 2;
    const SCAN_PRIORITY_HIGH = 3;
    const SCAN_PRIORITY_AUTO = 0;
    const PRIV_USER_ADMIN = 0;
    const PRIV_SYS_ADMIN = 1;
    const PRIV_READ_WRITE_UDF = 12;
    const PRIV_READ_WRITE = 11;
    const PRIV_READ = 10;
    const PRIV_DATA_ADMIN = 2;
    const POLICY_RETRY_ONCE = 1;
    const POLICY_RETRY_NONE = 0;
    const POLICY_REPLICA_MASTER = 0;
    const POLICY_REPLICA_ANY = 1;
    const POLICY_KEY_SEND = 1;
    const POLICY_KEY_DIGEST = 0;
    const POLICY_GEN_IGNORE = 0;
    const POLICY_GEN_GT = 2;
    const POLICY_GEN_EQ = 1;
    const POLICY_EXISTS_UPDATE = 2;
    const POLICY_EXISTS_REPLACE = 3;
    const POLICY_EXISTS_IGNORE = 0;
    const POLICY_EXISTS_CREATE_OR_REPLACE = 4;
    const POLICY_EXISTS_CREATE = 1;
    const POLICY_CONSISTENCY_ONE = 0;
    const POLICY_CONSISTENCY_ALL = 1;
    const POLICY_COMMIT_LEVEL_MASTER = 1;
    const POLICY_COMMIT_LEVEL_ALL = 0;

    // Query Predicate Operators
    const OP_RANGE = 'RANGE';
    const OP_EQ = '=';
    const OP_CONTAINS = 'CONTAINS';
    const OP_BETWEEN = 'BETWEEN';

    const OPT_WRITE_TIMEOUT = 3;
    const OPT_TTL = 16;
    const OPT_SERIALIZER = 6;
    const OPT_SCAN_PRIORITY = 7;
    const OPT_SCAN_PERCENTAGE = 8;
    const OPT_SCAN_NOBINS = 10;
    const OPT_SCAN_CONCURRENTLY = 9;
    const OPT_READ_TIMEOUT = 2;
    const OPT_POLICY_RETRY = 4;
    const OPT_POLICY_REPLICA = 13;
    const OPT_POLICY_KEY = 11;
    const OPT_POLICY_GEN = 12;
    const OPT_POLICY_EXISTS = 5;
    const OPT_POLICY_CONSISTENCY = 14;
    const OPT_POLICY_COMMIT_LEVEL = 15;
    const OPT_CONNECT_TIMEOUT = 1;
    const OPERATOR_WRITE = 2;
    const OPERATOR_TOUCH = 11;
    const OPERATOR_READ = 1;
    const OPERATOR_PREPEND = 10;
    const OPERATOR_INCR = 5;
    const OPERATOR_APPEND = 9;
    const OK = 0;
    const LOG_LEVEL_WARN = 4;
    const LOG_LEVEL_TRACE = 1;
    const LOG_LEVEL_OFF = 6;
    const LOG_LEVEL_INFO = 3;
    const LOG_LEVEL_ERROR = 5;
    const LOG_LEVEL_DEBUG = 2;
    const INDEX_TYPE_STRING = 0;
    const INDEX_TYPE_MAPVALUES = 3;
    const INDEX_TYPE_MAPKEYS = 2;
    const INDEX_TYPE_LIST = 1;
    const INDEX_TYPE_INTEGER = 1;
    const INDEX_TYPE_DEFAULT = 0;
    const INDEX_STRING = 0;
    const INDEX_NUMERIC = 1;
    const ERR_USER_ALREADY_EXISTS = 61;
    const ERR_UNSUPPORTED_FEATURE = 16;
    const ERR_UDF_NOT_FOUND = 1301;
    const ERR_UDF = 100;
    const ERR_TIMEOUT = 9;
    const ERR_SERVER_FULL = 8;
    const ERR_SERVER = 1;
    const ERR_SECURITY_SCHEME_NOT_SUPPORTED = 53;
    const ERR_SECURITY_NOT_SUPPORTED = 51;
    const ERR_SECURITY_NOT_ENABLED = 52;
    const ERR_SCAN_ABORTED = 15;
    const ERR_ROLE_VIOLATION = 81;
    const ERR_ROLE_ALREADY_EXISTS = 71;
    const ERR_REQUEST_INVALID = 4;
    const ERR_RECORD_TOO_BIG = 13;
    const ERR_RECORD_NOT_FOUND = 2;
    const ERR_RECORD_KEY_MISMATCH = 19;
    const ERR_RECORD_GENERATION = 3;
    const ERR_RECORD_EXISTS = 5;
    const ERR_RECORD_BUSY = 14;
    const ERR_QUERY_TIMEOUT = 212;
    const ERR_QUERY_QUEUE_FULL = 211;
    const ERR_QUERY_END = 50;
    const ERR_QUERY_ABORTED = 210;
    const ERR_QUERY = 213;
    const ERR_PARAM = -2;
    const ERR_NO_XDR = 10;
    const ERR_NOT_AUTHENTICATED = 80;
    const ERR_NAMESPACE_NOT_FOUND = 20;
    const ERR_LUA_FILE_NOT_FOUND = 1302;
    const ERR_LARGE_ITEM_NOT_FOUND = 125;
    const ERR_INVALID_USER = 60;
    const ERR_INVALID_ROLE = 70;
    const ERR_INVALID_PRIVILEGE = 72;
    const ERR_INVALID_PASSWORD = 62;
    const ERR_INVALID_HOST = -4;
    const ERR_INVALID_FIELD = 55;
    const ERR_INVALID_CREDENTIAL = 65;
    const ERR_INVALID_COMMAND = 54;
    const ERR_INDEX_OOM = 202;
    const ERR_INDEX_NOT_READABLE = 203;
    const ERR_INDEX_NOT_FOUND = 201;
    const ERR_INDEX_NAME_MAXLEN = 205;
    const ERR_INDEX_MAXCOUNT = 206;
    const ERR_INDEX_FOUND = 200;
    const ERR_INDEX = 204;
    const ERR_ILLEGAL_STATE = 56;
    const ERR_FORBIDDEN_PASSWORD = 64;
    const ERR_EXPIRED_PASSWORD = 63;
    const ERR_DEVICE_OVERLOAD = 18;
    const ERR_CLUSTER_CHANGE = 7;
    const ERR_CLUSTER = 11;
    const ERR_CLIENT = -1;
    const ERR_BIN_NOT_FOUND = 17;
    const ERR_BIN_NAME = 21;
    const ERR_BIN_INCOMPATIBLE_TYPE = 12;
    const ERR_BIN_EXISTS = 6;

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
     * @param array $key
     * @param int   $ttl
     * @param array $options
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
     * @param array  $key
     * @param string $bin
     * @param int    $offset
     * @param array  $options
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
     * @param string   $ns
     * @param string   $set
     * @param callable $record
     * @param array    $select
     * @param array    $options
     *
     * @return int
     */
    public function scan($ns, $set, $record, array $select = [], array $options = [])
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
