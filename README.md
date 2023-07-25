# Simple-Drupal-CR-API

simple Drupal Read and write API
fetch anything and create simple nodes easily

Use cases made using React.

USE CASE 1: Fetch multiple taxonomies

const [datas, setData] = useState({ entryModes: { name: '' }, TypesOfWaste: { name: '' } });
const dataQueryObject = {
    "endpoint": "api/v1/fetch-data",
    "queryData": {
        "type": "taxonomy_term",
        "return": ["name", "changed", "tid"],
        "parameters": [
            {
                "currencies": [{ "vid": "types_of_money" }]
            },
            {
                "clothing": [{ "vid": "clothes","size":"XL" }]
            }
        ]
    }
};
const params = { query: dataQueryObject.queryData };
axios.post(axios.defaults.baseURL + dataQueryObject.endpoint, {}, { params, auth: auth })
.then(res => { setData(res.data) });


------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


USE CASE 2: Create node

const apiInfo = { "endpoint": "api/v1/create-node" };
const onSubmit = (data) => {
  axios.post(axios.defaults.baseURL + apiInfo.endpoint, {}, { params, auth: auth }).then(res => {
    //success
  }).catch(error => {
    //error
  });
}
return (
  <Page>
    <form onSubmit={handleSubmit(onSubmit)}>
      <Input type="hidden" placeholder="type" value="currency" {...register("type")} />
      <Input type="text" label="title" placeholder="title" {...register("title")} />
      <Input type="text" label="input" placeholder="input" {...register("description")} inputStyle="box" labelStyle="floating" />
    </form>
  </Page>
);
