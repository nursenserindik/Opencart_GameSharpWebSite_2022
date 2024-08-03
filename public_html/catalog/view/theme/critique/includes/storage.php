<?php
/**
 * Theme storage manipulations
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) {
	exit; }

// Get theme variable
if ( ! function_exists( 'critique_storage_get' ) ) {
	function critique_storage_get( $var_name, $default = '' ) {
		global $CRITIQUE_STORAGE;
		return isset( $CRITIQUE_STORAGE[ $var_name ] ) ? $CRITIQUE_STORAGE[ $var_name ] : $default;
	}
}

// Set theme variable
if ( ! function_exists( 'critique_storage_set' ) ) {
	function critique_storage_set( $var_name, $value ) {
		global $CRITIQUE_STORAGE;
		$CRITIQUE_STORAGE[ $var_name ] = $value;
	}
}

// Check if theme variable is empty
if ( ! function_exists( 'critique_storage_empty' ) ) {
	function critique_storage_empty( $var_name, $key = '', $key2 = '' ) {
		global $CRITIQUE_STORAGE;
		if ( ! empty( $key ) && ! empty( $key2 ) ) {
			return empty( $CRITIQUE_STORAGE[ $var_name ][ $key ][ $key2 ] );
		} elseif ( ! empty( $key ) ) {
			return empty( $CRITIQUE_STORAGE[ $var_name ][ $key ] );
		} else {
			return empty( $CRITIQUE_STORAGE[ $var_name ] );
		}
	}
}

// Check if theme variable is set
if ( ! function_exists( 'critique_storage_isset' ) ) {
	function critique_storage_isset( $var_name, $key = '', $key2 = '' ) {
		global $CRITIQUE_STORAGE;
		if ( ! empty( $key ) && ! empty( $key2 ) ) {
			return isset( $CRITIQUE_STORAGE[ $var_name ][ $key ][ $key2 ] );
		} elseif ( ! empty( $key ) ) {
			return isset( $CRITIQUE_STORAGE[ $var_name ][ $key ] );
		} else {
			return isset( $CRITIQUE_STORAGE[ $var_name ] );
		}
	}
}

// Delete theme variable
if ( ! function_exists( 'critique_storage_unset' ) ) {
	function critique_storage_unset( $var_name, $key = '', $key2 = '' ) {
		global $CRITIQUE_STORAGE;
		if ( ! empty( $key ) && ! empty( $key2 ) ) {
			unset( $CRITIQUE_STORAGE[ $var_name ][ $key ][ $key2 ] );
		} elseif ( ! empty( $key ) ) {
			unset( $CRITIQUE_STORAGE[ $var_name ][ $key ] );
		} else {
			unset( $CRITIQUE_STORAGE[ $var_name ] );
		}
	}
}

// Inc/Dec theme variable with specified value
if ( ! function_exists( 'critique_storage_inc' ) ) {
	function critique_storage_inc( $var_name, $value = 1 ) {
		global $CRITIQUE_STORAGE;
		if ( empty( $CRITIQUE_STORAGE[ $var_name ] ) ) {
			$CRITIQUE_STORAGE[ $var_name ] = 0;
		}
		$CRITIQUE_STORAGE[ $var_name ] += $value;
	}
}

// Concatenate theme variable with specified value
if ( ! function_exists( 'critique_storage_concat' ) ) {
	function critique_storage_concat( $var_name, $value ) {
		global $CRITIQUE_STORAGE;
		if ( empty( $CRITIQUE_STORAGE[ $var_name ] ) ) {
			$CRITIQUE_STORAGE[ $var_name ] = '';
		}
		$CRITIQUE_STORAGE[ $var_name ] .= $value;
	}
}

// Get array (one or two dim) element
if ( ! function_exists( 'critique_storage_get_array' ) ) {
	function critique_storage_get_array( $var_name, $key, $key2 = '', $default = '' ) {
		global $CRITIQUE_STORAGE;
		if ( empty( $key2 ) ) {
			return ! empty( $var_name ) && ! empty( $key ) && isset( $CRITIQUE_STORAGE[ $var_name ][ $key ] ) ? $CRITIQUE_STORAGE[ $var_name ][ $key ] : $default;
		} else {
			return ! empty( $var_name ) && ! empty( $key ) && isset( $CRITIQUE_STORAGE[ $var_name ][ $key ][ $key2 ] ) ? $CRITIQUE_STORAGE[ $var_name ][ $key ][ $key2 ] : $default;
		}
	}
}

// Set array element
if ( ! function_exists( 'critique_storage_set_array' ) ) {
	function critique_storage_set_array( $var_name, $key, $value ) {
		global $CRITIQUE_STORAGE;
		if ( ! isset( $CRITIQUE_STORAGE[ $var_name ] ) ) {
			$CRITIQUE_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			$CRITIQUE_STORAGE[ $var_name ][] = $value;
		} else {
			$CRITIQUE_STORAGE[ $var_name ][ $key ] = $value;
		}
	}
}

// Set two-dim array element
if ( ! function_exists( 'critique_storage_set_array2' ) ) {
	function critique_storage_set_array2( $var_name, $key, $key2, $value ) {
		global $CRITIQUE_STORAGE;
		if ( ! isset( $CRITIQUE_STORAGE[ $var_name ] ) ) {
			$CRITIQUE_STORAGE[ $var_name ] = array();
		}
		if ( ! isset( $CRITIQUE_STORAGE[ $var_name ][ $key ] ) ) {
			$CRITIQUE_STORAGE[ $var_name ][ $key ] = array();
		}
		if ( '' === $key2 ) {
			$CRITIQUE_STORAGE[ $var_name ][ $key ][] = $value;
		} else {
			$CRITIQUE_STORAGE[ $var_name ][ $key ][ $key2 ] = $value;
		}
	}
}

// Merge array elements
if ( ! function_exists( 'critique_storage_merge_array' ) ) {
	function critique_storage_merge_array( $var_name, $key, $value ) {
		global $CRITIQUE_STORAGE;
		if ( ! isset( $CRITIQUE_STORAGE[ $var_name ] ) ) {
			$CRITIQUE_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			$CRITIQUE_STORAGE[ $var_name ] = array_merge( $CRITIQUE_STORAGE[ $var_name ], $value );
		} else {
			$CRITIQUE_STORAGE[ $var_name ][ $key ] = array_merge( $CRITIQUE_STORAGE[ $var_name ][ $key ], $value );
		}
	}
}

// Add array element after the key
if ( ! function_exists( 'critique_storage_set_array_after' ) ) {
	function critique_storage_set_array_after( $var_name, $after, $key, $value = '' ) {
		global $CRITIQUE_STORAGE;
		if ( ! isset( $CRITIQUE_STORAGE[ $var_name ] ) ) {
			$CRITIQUE_STORAGE[ $var_name ] = array();
		}
		if ( is_array( $key ) ) {
			critique_array_insert_after( $CRITIQUE_STORAGE[ $var_name ], $after, $key );
		} else {
			critique_array_insert_after( $CRITIQUE_STORAGE[ $var_name ], $after, array( $key => $value ) );
		}
	}
}

// Add array element before the key
if ( ! function_exists( 'critique_storage_set_array_before' ) ) {
	function critique_storage_set_array_before( $var_name, $before, $key, $value = '' ) {
		global $CRITIQUE_STORAGE;
		if ( ! isset( $CRITIQUE_STORAGE[ $var_name ] ) ) {
			$CRITIQUE_STORAGE[ $var_name ] = array();
		}
		if ( is_array( $key ) ) {
			critique_array_insert_before( $CRITIQUE_STORAGE[ $var_name ], $before, $key );
		} else {
			critique_array_insert_before( $CRITIQUE_STORAGE[ $var_name ], $before, array( $key => $value ) );
		}
	}
}

// Push element into array
if ( ! function_exists( 'critique_storage_push_array' ) ) {
	function critique_storage_push_array( $var_name, $key, $value ) {
		global $CRITIQUE_STORAGE;
		if ( ! isset( $CRITIQUE_STORAGE[ $var_name ] ) ) {
			$CRITIQUE_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			array_push( $CRITIQUE_STORAGE[ $var_name ], $value );
		} else {
			if ( ! isset( $CRITIQUE_STORAGE[ $var_name ][ $key ] ) ) {
				$CRITIQUE_STORAGE[ $var_name ][ $key ] = array();
			}
			array_push( $CRITIQUE_STORAGE[ $var_name ][ $key ], $value );
		}
	}
}

// Pop element from array
if ( ! function_exists( 'critique_storage_pop_array' ) ) {
	function critique_storage_pop_array( $var_name, $key = '', $defa = '' ) {
		global $CRITIQUE_STORAGE;
		$rez = $defa;
		if ( '' === $key ) {
			if ( isset( $CRITIQUE_STORAGE[ $var_name ] ) && is_array( $CRITIQUE_STORAGE[ $var_name ] ) && count( $CRITIQUE_STORAGE[ $var_name ] ) > 0 ) {
				$rez = array_pop( $CRITIQUE_STORAGE[ $var_name ] );
			}
		} else {
			if ( isset( $CRITIQUE_STORAGE[ $var_name ][ $key ] ) && is_array( $CRITIQUE_STORAGE[ $var_name ][ $key ] ) && count( $CRITIQUE_STORAGE[ $var_name ][ $key ] ) > 0 ) {
				$rez = array_pop( $CRITIQUE_STORAGE[ $var_name ][ $key ] );
			}
		}
		return $rez;
	}
}

// Inc/Dec array element with specified value
if ( ! function_exists( 'critique_storage_inc_array' ) ) {
	function critique_storage_inc_array( $var_name, $key, $value = 1 ) {
		global $CRITIQUE_STORAGE;
		if ( ! isset( $CRITIQUE_STORAGE[ $var_name ] ) ) {
			$CRITIQUE_STORAGE[ $var_name ] = array();
		}
		if ( empty( $CRITIQUE_STORAGE[ $var_name ][ $key ] ) ) {
			$CRITIQUE_STORAGE[ $var_name ][ $key ] = 0;
		}
		$CRITIQUE_STORAGE[ $var_name ][ $key ] += $value;
	}
}

// Concatenate array element with specified value
if ( ! function_exists( 'critique_storage_concat_array' ) ) {
	function critique_storage_concat_array( $var_name, $key, $value ) {
		global $CRITIQUE_STORAGE;
		if ( ! isset( $CRITIQUE_STORAGE[ $var_name ] ) ) {
			$CRITIQUE_STORAGE[ $var_name ] = array();
		}
		if ( empty( $CRITIQUE_STORAGE[ $var_name ][ $key ] ) ) {
			$CRITIQUE_STORAGE[ $var_name ][ $key ] = '';
		}
		$CRITIQUE_STORAGE[ $var_name ][ $key ] .= $value;
	}
}

// Call object's method
if ( ! function_exists( 'critique_storage_call_obj_method' ) ) {
	function critique_storage_call_obj_method( $var_name, $method, $param = null ) {
		global $CRITIQUE_STORAGE;
		if ( null === $param ) {
			return ! empty( $var_name ) && ! empty( $method ) && isset( $CRITIQUE_STORAGE[ $var_name ] ) ? $CRITIQUE_STORAGE[ $var_name ]->$method() : '';
		} else {
			return ! empty( $var_name ) && ! empty( $method ) && isset( $CRITIQUE_STORAGE[ $var_name ] ) ? $CRITIQUE_STORAGE[ $var_name ]->$method( $param ) : '';
		}
	}
}

// Get object's property
if ( ! function_exists( 'critique_storage_get_obj_property' ) ) {
	function critique_storage_get_obj_property( $var_name, $prop, $default = '' ) {
		global $CRITIQUE_STORAGE;
		return ! empty( $var_name ) && ! empty( $prop ) && isset( $CRITIQUE_STORAGE[ $var_name ]->$prop ) ? $CRITIQUE_STORAGE[ $var_name ]->$prop : $default;
	}
}
