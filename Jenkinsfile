pipeline {
    agent any

    environment {
        // 환경 변수 설정
        NCR_REPOSITORY = '0c0aedbf-kr1-registry.container.nhncloud.com/nh-reg'
        DOCKER_IMAGENAME = 'nh-web'
        DOCKER_USERNAME = 'credentials("nhncloud-credentials").username'
        DOCKER_PASSWORD = 'credentials("nhncloud-credentials").password'
        IMAGE_TAG = 'latest'
    }

    stages {
        stage('Checkout') {
            steps {
                // GitHub 저장소에서 소스 코드 체크아웃
                git branch: 'main', url: 'https://github.com/kolion98/TestWeb.git'
            }
        }
      
        stage('Docker Login') {
            steps {
                sh "docker login $NCR_REPOSITORY -u $DOCKER_USERNAME -p $DOCKER_PASSWORD"
            }
        }

        stage('Build & Push Docker Images') {
            steps {
              script {
                dir('/home/ubuntu/dev/TestWeb') {                  
                    sh 'docker build -t $DOCKER_IMAGENAME:$IMAGE_TAG .'
                    sh 'docker tag $DOCKER_IMAGENAME:$IMAGE_TAG $NCR_REPOSITORY/$DOCKER_IMAGENAME:$IMAGE_TAG'
                    sh 'docker push $NCR_REPOSITORY/$DOCKER_IMAGENAME:$IMAGE_TAG'
                }
              }
            }
        }

        stage('Deploy to Kubernetes') {
            steps {
                script {
                  dir('/home/ubuntu/dev/TestWeb/cicd') {
                    def kubeconfigPath = '/home/ubuntu/dev/TestWeb/cicd/nh-pro-nks_kubeconfig.yaml'
                    // KUBECONFIG 환경 변수 설정 (등호 양 옆에 공백이 없도록 주의)
                    withEnv(["KUBECONFIG=$kubeconfigPath"]) {
                        // Kubernetes 클러스터에 Deployment 적용
                        sh 'kubectl apply -f testweb-deployment.yaml'
                    }
                  }
                }
            }
        }
    }

    post {
        always {
            // 항상 실행되는 작업, 예를 들어 클린업
            echo '이 작업은 실행 결과에 상관없이 항상 실행됩니다.'
        }
        success {
            // 빌드 성공 시 실행되는 작업
            echo '이 작업은 빌드가 성공하면 실행됩니다.'
        }
        failure {
            // 빌드 실패 시 실행되는 작업
            echo '이 작업은 빌드가 실패하면 실행됩니다.'
        }
    }
}
