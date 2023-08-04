// @see https://docs.aircode.io/guide/functions/
const aircode = require('aircode');

module.exports = async function (params, context) {
  console.log('Received params:', params);

  const table = aircode.db.table('Students');
  await table.save({ name: 'wangxiao', age: 34 });
  
  return {
    name: 'wangxiao',
    message: 'Hi, AirCode.',
  };
};
