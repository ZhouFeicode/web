document.addEventListener('DOMContentLoaded',()=>{
  const e=document.getElementById('login');
  if(e)
document.getElementById('login').addEventListener('submit',(event)=>{
    event.preventDefault();
    var user=document.getElementById('user');
    var pass=document.getElementById('pass');
    if(!user.value.trim()) {alert('用户名必填！');return;}
    if(!pass.value.trim()) {alert('密码必填！');return;}
  document.getElementById('login').submit();
});
  
})
document.addEventListener('DOMContentLoaded',()=>{
    const e=document.getElementById('sign');
  if(e)
    document.getElementById('sign').addEventListener('submit',(event)=>{
    event.preventDefault();
    var user=document.getElementById('suser');
    var pass=document.getElementById('spass');
      var pass2=document.getElementById('spass2');
    if(!user.value.trim()) {alert('用户名必填！');return;}
    if(!pass.value.trim()) {alert('密码必填！');return;}
    if(!pass2.value.trim()) {alert('确认密码必填！');return;}
    if(pass.value!==pass2.value){alert('两次密码输入不相同!');return;}
  document.getElementById('sign').submit();
});
})
document.addEventListener('DOMContentLoaded',()=>{
  const e=document.getElementsByClassName('dsort');
  if(e){
  const count=document.getElementsByClassName('dsort').length;
  for(let i=0;i<count;i++){
  document.getElementsByClassName('dsort')[i].addEventListener('submit',(event)=>{
    event.preventDefault();
    var conf=confirm("确定删除分类内所有笔记吗？");
    if(conf) document.getElementsByClassName('dsort')[i].submit();
  })
}}
})
document.addEventListener('DOMContentLoaded',()=>{
    const e=document.getElementsByClassName('dnote');
  if(e){
const count=document.getElementsByClassName('dnote').length;
for(let i=0;i<count;i++){
document.getElementsByClassName('dnote')[i].addEventListener('submit',(event)=>{
event.preventDefault();
var conf=confirm('确定删除此笔记吗？');
if(conf) document.getElementsByClassName('dnote')[i].submit();
})
}}
})
document.addEventListener('DOMContentLoaded',()=>{
    const e=document.getElementById('resort');
  if(e){
  document.getElementById('resort').addEventListener('submit',(event)=>{
    event.preventDefault();
    var conf=confirm('确定恢复分类内所有笔记吗？');
    if(conf) document.getElementById('resort').submit();
  })
}
})
document.addEventListener('DOMContentLoaded',()=>{
    const e=document.getElementById('mosort');
  if(e){
  document.getElementById('mosort').addEventListener('submit',(event)=>{
    event.preventDefault();
    var conf=confirm('确定恢复分类内所有笔记吗？');
    if(conf) document.getElementById('mosort').submit();
  })
}
})
document.addEventListener('DOMContentLoaded',()=>{
    const e=document.getElementsByClassName('renote');
  if(e){
const count=document.getElementsByClassName('renote').length;
for(let i=0;i<count;i++){
document.getElementsByClassName('renote')[i].addEventListener('submit',(event)=>{
event.preventDefault();
var conf=confirm('确定恢复此笔记吗？');
if(conf) document.getElementsByClassName('renote')[i].submit();
})
}}
})
document.addEventListener('DOMContentLoaded',()=>{
    const e=document.getElementsByClassName('monote');
  if(e){
const count=document.getElementsByClassName('monote').length;
for(let i=0;i<count;i++){
document.getElementsByClassName('monote')[i].addEventListener('submit',(event)=>{
event.preventDefault();
var conf=confirm('确定删除此笔记吗？');
if(conf) document.getElementsByClassName('monote')[i].submit();
})
}}
})

document.addEventListener('DOMContentLoaded',()=>{
    const e=document.getElementById('creform');
  if(e){
  document.getElementById('creform').addEventListener('submit',(event)=>{
    event.preventDefault();
    var t=document.getElementById('inp1').value;
    if(!t) {alert('标题必填！');return;}
    document.getElementById('creform').submit();

  })
}

})
document.addEventListener('DOMContentLoaded',()=>{
    const e=document.getElementsByClassName('create');
  if(e){
  var count=document.getElementsByClassName('create').length;
  for(let i=0;i<count;i++){
    document.getElementsByClassName('create')[i].addEventListener('click',()=>{
      var sort=document.getElementsByClassName('create')[i].dataset.name;
      localStorage.setItem('sort',sort);
    })
  }}
})
document.addEventListener('DOMContentLoaded',()=>{
    const e=document.getElementById('sorthid');
    const e1=document.getElementById('idhid');
  if(e&&e1){
  if(localStorage.getItem('sort'))
  document.getElementById('sorthid').value=localStorage.getItem('sort');
if(localStorage.getItem('id'))
  document.getElementById('idhid').value=localStorage.getItem('id');}
})

document.addEventListener('DOMContentLoaded',()=>{
  const e=document.getElementById('return');
  if(e){
document.getElementById('return').addEventListener('click',()=>{
  window.location.href='index.php';
})
  }
})
document.addEventListener('DOMContentLoaded',()=>{
 var modifybutton=document.getElementsByClassName('modify');
 if(modifybutton){
  var count=modifybutton.length;
  for (let i=0;i<count;i++){
  modifybutton[i].addEventListener('click',()=>{
    var id=modifybutton[i].dataset.id;
    localStorage.setItem('id',id);
    window.location.href=`create.php?id=${id}`;
  })
}}
})
document.addEventListener('DOMContentLoaded',()=>{
   const e=document.getElementById('cancel');
  if(e)
  document.getElementById('cancel').addEventListener('click',()=>{
    document.getElementById('createarea').style.visibility='hidden';
  })

const e1=document.getElementById('edit');
if(e1)
 document.getElementById('edit').addEventListener('click',()=>{
    document.getElementById('createarea').style.visibility='visible';
    document.getElementById('namein').value="";
  })
})
document.addEventListener('DOMContentLoaded',()=>{
 
})
document.addEventListener('DOMContentLoaded',()=>{
   const e=document.getElementById('createform');
  if(e)
  document.getElementById('createform').addEventListener('submit',(event)=>{
    event.preventDefault();
    var t=document.getElementById('sortt').value;
    if(!t.trim()) {alert('分类名必填！');return;}
    document.getElementById('createform').submit();
  })
})
document.addEventListener('DOMContentLoaded',()=>{
   const e=document.getElementsByClassName('otherde');
  if(e){
   var count=document.getElementsByClassName('otherde').length;
   for(let i=0;i<count;i++){
  document.getElementsByClassName('otherde')[i].addEventListener('submit',(event)=>{
    event.preventDefault();
    var conf=confirm('确定删除此分类吗？');
    if(conf) document.getElementsByClassName('otherde')[i].submit();
  })
   }}
})
document.addEventListener('DOMContentLoaded',()=>{
   const e=document.getElementsByClassName('otherc');
  if(e){
  var count=document.getElementsByClassName('otherc').length;
  for(let i=0;i<count;i++){
 document.getElementsByClassName('otherc')[i].addEventListener('click',()=>{
    var sort=document.getElementsByClassName('otherc')[i].dataset.sort;
    localStorage.setItem('sort',sort);
  })
  }}
})
document.addEventListener('DOMContentLoaded',()=>{
   const e=document.getElementsByClassName('rename');
  if(e){
  var count=document.getElementsByClassName('rename').length;
  for(let i=0;i<count;i++){
    document.getElementsByClassName('rename')[i].addEventListener('click',()=>{
      document.getElementById('createarea').style.visibility="visible";
      var sort=document.getElementsByClassName('rename')[i].dataset.sort;
     document.getElementById('namein').value=sort;
    })
  }}
})
