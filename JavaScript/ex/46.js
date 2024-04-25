// asnyc.await

// 콜백지옥


// 프로미스 객체로 개선
const PRO = (str, ms) => {
	return new Promise( (resolve) => {
		setTimeout(()=>{
			console.log(str);
			resolve();
		}, ms);
	});
}

PRO('A', 3000)
.then(() => PRO('B', 2000))
.then(() => PRO('C', 1000));

const myAsync = async () => {
    try{
        await PRO2('A', 3000);
        await PRO2('B', 2000);
        await PRO2('C', 1000);
    } catch(err) {
        console.log(err);
    } 
}