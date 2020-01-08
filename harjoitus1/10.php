<?php
function throw_exception() {
  throw new Exception("Exception!");
}

try {
    throw_exception();
} catch (Exception $e) {
    echo "Exception caught!\n";
} finally {
    echo "Done!";
}
?>